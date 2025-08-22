<?php

namespace Database\Seeders;

use App\Models\Item_Orden;
use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Items_OrdenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtener todos los pedidos y productos existentes
        $orders = Orden::all();
        $products = Producto::all();

        // Verificar que existen pedidos y productos
        if ($orders->isEmpty() || $products->isEmpty()) {
            $this->command->info('No hay pedidos o productos existentes!');
            $this->command->info('Por favor ejecuta primero OrdersTableSeeder y ProductsTableSeeder.');
            return;
        }

        // Por cada pedido, agregar entre 1 y 5 ítems aleatorios
        $orders->each(function ($order) use ($products) {
            $itemsCount = rand(1, 5);
            $usedProducts = [];

            for ($i = 0; $i < $itemsCount; $i++) {
                // Seleccionar un producto que no se haya usado ya en este pedido
                $availableProducts = $products->whereNotIn('id', $usedProducts);
                
                if ($availableProducts->isEmpty()) {
                    break;
                }

                $product = $availableProducts->random();
                $usedProducts[] = $product->id;

                // Cantidad aleatoria entre 1 y 3
                $quantity = rand(1, 3);

                // Crear el ítem del pedido
                Item_Orden::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $product->price, // Guardamos el precio actual
                    'subtotal' => $product->price * $quantity,
                ]);
            }

            // Actualizar el total del pedido (suma de todos los subtotales)
            $order->update([
                'total' => $order->items()->sum('subtotal')
            ]);
        });

        $this->command->info('OrderItems creados exitosamente!');
    }
}