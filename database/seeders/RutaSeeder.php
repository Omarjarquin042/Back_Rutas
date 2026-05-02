<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruta;

class RutaSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 10 rutas
        Ruta::factory(10)->create();
    }
}
