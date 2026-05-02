<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reporte;

class ReporteSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 20 reportes
        Reporte::factory(20)->create();
    }
}
