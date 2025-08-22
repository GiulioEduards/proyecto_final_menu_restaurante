<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Ensalada César',
                'description' => 'Ensalada fresca con pollo y aderezo César',
                'price' => 25.90,
                'category_id' => 1,
            ],
            [
                'name' => 'Pique Macho',
                'description' => 'Plato tradicional boliviano',
                'price' => 32.50,
                'category_id' => 2,
            ],
            [
                'name' => 'huminta al horno',
                'description' => 'Postre tradicional',
                'price' => 12.00,
                'category_id' => 3,
            ],
            [
                'name' => 'Chicha Morada',
                'description' => 'Bebida tradicional',
                'price' => 8.00,
                'category_id' => 4,
            ],
        ];

        foreach ($products as $product) {
            Producto::create($product);
        }
    }
}
