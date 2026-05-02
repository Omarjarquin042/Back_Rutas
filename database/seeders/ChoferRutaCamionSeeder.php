<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChoferRutaCamion;

class ChoferRutaCamionSeeder extends Seeder
{
    public function run(): void
    {
  
        ChoferRutaCamion::factory(20)->create();
    }
}
