<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Colonia;
use App\Models\User;

/**
 * @extends \Illuminate\Database\EloquentFactories\Factory<\App\Models\Reporte>
 */
class ReporteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->sentence(12), // descripción breve
            'fecha_reporte' => now(),

            'id_colonia' => Colonia::inRandomOrder()->first()->id,

            // Solo usa choferes
            'id_chofer' => User::where('rol', 'chofer')->inRandomOrder()->first()->id,
        ];
    }
}
