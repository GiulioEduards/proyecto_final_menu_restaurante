<?php

namespace Database\Seeders;

use App\Models\Tipo_delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposDeliverysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = [
            ['name' => 'Recojo en local', 'price' => 0.00],
            ['name' => 'Delivery estándar', 'price' => 5.00],
            ['name' => 'Delivery express', 'price' => 10.00],
        ];

        foreach ($types as $type) {
            Tipo_delivery::create($type);
        }
    }
}
