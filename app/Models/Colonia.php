<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ruta;

class Colonia extends Model
{
  use HasFactory;

    protected $table = 'colonias';

    protected $fillable = [
        'nombre',
        'calle',
        'numero_calle',
        'prioridad',
        'estado',
        'id_ruta'
    ];

    // Relación inversa: Una Colonia pertenece a una Ruta
    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_ruta');
    }
}
