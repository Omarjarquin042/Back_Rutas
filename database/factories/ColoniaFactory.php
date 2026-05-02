<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ruta;

/**
 * @extends \Illuminate\Database\EloquentFactories\Factory<\App\Models\Colonia>
 */
class ColoniaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->streetName(),
            'calle' => $this->faker->streetName(),
            'numero_calle' => $this->faker->buildingNumber(),

            'prioridad' => $this->faker->randomElement(['muy alta', 'alta', 'baja']),
            'estado' => $this->faker->randomElement(['atendido', 'no atendido']),

            // Ruta existente
            'id_ruta' => Ruta::inRandomOrder()->first()->id,
        ];
    }
}
