<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Ruta;
use App\Models\Camion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories.Factory<\App\Models\ChoferRutaCamion>
 */
class ChoferRutaCamionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_user' => User::where('rol', 'chofer')->inRandomOrder()->first()->id,
            'id_ruta' => Ruta::inRandomOrder()->first()->id,
            'id_camion' => Camion::inRandomOrder()->first()->id,
            'fecha' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['asignado', 'completado']),
        ];
    }
}
