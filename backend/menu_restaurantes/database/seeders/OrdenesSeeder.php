<?php

namespace Database\Seeders;

use App\Models\Orden;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $mesero = User::where('email', 'mesero@restaurante.com')->first();
       // Pedido 1: Delivery con propina
        $order1 = Orden::create([
            'name_customer' => "Cesar Zabala",
            'delivery_type_id' => 2,
            'total' => 0, // Se actualizará después
            'status' => 'completado',
            'delivery_address' => 'Av. Los Jardines 123, Lima 15048',
            'contact_phone' => '999888777',
            'notes' => 'Dejar en portería. No tocar timbre después de las 9pm.',
            'created_at' => now()->subDays(3),
            'updated_at' => now()->subDays(3)
        ]);

        // Pedido 2: Recojo en local
        $order2 = Orden::create([
            'name_customer' => "Jair Paco",
            'delivery_type_id' => 1,
            'total' => 0,
            'status' => 'en_preparacion',
            'notes' => 'Para llevar. Incluir cubiertos extras.',
            'created_at' => now()->subDay(),
            'updated_at' => now()->subDay()
        ]);

        // Pedido 3: Pedido en mesa (atendido por mesero)
        $order3 = Orden::create([
            'name_customer' => "Alison Carrillo",
            'delivery_type_id' => 1,
            'total' => 0,
            'status' => 'pendiente',
            'notes' => 'Mesa 5 - Atendido por '. $mesero->name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}