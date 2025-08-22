<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 // Usuario Administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@restaurante.com',
            'password' => Hash::make('password123'),
            'phone' => '999888777',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Usuario gerente
        User::create([
            'name' => 'gerente Principal',
            'email' => 'gerente@restaurante.com',
            'password' => Hash::make('gerentepassword'),
            'phone' => '988777666',
            'role' => 'gerente',
            'email_verified_at' => now(),
        ]);

        // Usuario Mesero
        User::create([
            'name' => 'Mesero Ejemplo',
            'email' => 'mesero@restaurante.com',
            'password' => Hash::make('meseropass'),
            'phone' => '977666555',
            'role' => 'mesero',
            'email_verified_at' => now(),
        ]);

        // Usuario Gefe de cocina
        User::create([
            'name' => 'Gefe de Cocina',
            'email' => 'GefeCocina@restaurante.com',
            'password' => Hash::make('GefeCocina123'),
            'phone' => '966555444',
            'role' => 'jefe de cocina',
            'email_verified_at' => now(),
        ]);
        // Usuario Cajero
        User::create([
            'name' => 'Cajero',
            'email' => 'cajero@restaurante.com',
            'password' => Hash::make('cajero123'),
            'phone' => '966555444',
            'role' => 'cajero',
            'email_verified_at' => now(),
        ]);
        
    }
}
