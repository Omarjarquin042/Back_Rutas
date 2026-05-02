<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruta;
use App\Models\RutaDia;

class RutaDiaSeeder extends Seeder
{
    public function run(): void
    {
        // Para cada ruta, asignar los 7 días de la semana
        $dias = ['lunes','martes','miercoles','jueves','viernes','sabado','domingo'];

        foreach (Ruta::all() as $ruta) {
            foreach ($dias as $dia) {
                RutaDia::create([
                    'id_ruta' => $ruta->id,
                    'dia_semana' => $dia
                ]);
            }
        }
    }
}
