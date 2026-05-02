<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruta>
 */
class RutaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre_ruta' => $this->faker->randomElement([
                'Ruta Centro',
                'Ruta Norte',
                'Ruta Sur',
                'Ruta Oriente',
                'Ruta Poniente',
                'Ruta Industrial',
                'Ruta Playa',
                'Ruta Mercado',
                'Ruta Hospital',
                'Ruta Colinas'
            ]),
            'turno' => $this->faker->randomElement(['matutino', 'vespertino']),
        ];
    }
}
