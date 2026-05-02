<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Camion>
 */
class CamionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'placas' => strtoupper($this->faker->bothify('###-???')), // ej: 123-ABC
            'modelo' => $this->faker->randomElement([
                'Volvo FH', 'Freightliner M2', 'Kenworth T680', 'International LT',
                'Mercedes Actros', 'Scania R450'
            ]),
            'id_users' => null, // lo asignas por tabla pivote, no directo
        ];
    }
}
