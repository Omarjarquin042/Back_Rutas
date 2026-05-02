<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RutaDia extends Model
{
    use HasFactory;

    protected $table = 'rutas_dias';

    protected $fillable = [
        'id_ruta',
        'dia_semana'
    ];

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_ruta');
    }
}
