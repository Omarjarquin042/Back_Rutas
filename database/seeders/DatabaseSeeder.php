<?php

namespace Database\Seeders;

use App\Models\Colonia;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RutaSeeder::class,
            CamionSeeder::class,
            ChoferRutaCamionSeeder::class,
            RutaDiaSeeder::class,
            ColoniaSeeder::class,
            ReporteSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
