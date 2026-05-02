<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ruta;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RutaDia>
 */
class RutaDiaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_ruta' => Ruta::inRandomOrder()->first()->id, 
            'dia_semana' => $this->faker->randomElement([
                'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'
            ])
        ];
    }
}
