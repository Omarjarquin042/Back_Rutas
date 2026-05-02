<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear UN solo administrador
        User::factory()->create([
            'name' => 'Administrador del Sistema',
            'email' => 'admin@example.com',
            'rol' => 'admin',
            'password' => bcrypt('12345678') // contraseña fija
        ]);

        // Crear 16 choferes
        User::factory(16)->create([
            'rol' => 'chofer'
        ]);
    }
}
