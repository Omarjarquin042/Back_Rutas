<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Colonia;

class ColoniaSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 20 colonias
        Colonia::factory(20)->create();
    }
}
