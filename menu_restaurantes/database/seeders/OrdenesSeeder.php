<?php

namespace Database\Seeders;

use App\Models\Orden;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'name_customer' => 'Cesar Zabala',
                'delivery_type_id' => 1,
                'total' => 25.90,
                'delivery_address' => 'Bella Vista',
                'contact_phone' => '74555874'
            ],
        ];

        foreach ($orders as $order) {
            Orden::create($order);
        }
    }
}