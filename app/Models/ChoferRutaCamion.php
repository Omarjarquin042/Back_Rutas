<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoferRutaCamion extends Model
{
    use HasFactory;
    protected $table = 'chofer_ruta_camion';

    protected $fillable = [
        'id_user',
        'id_ruta',
        'id_camion',
        'fecha',
        'estado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_ruta');
    }

    public function camion()
    {
        return $this->belongsTo(Camion::class, 'id_camion');
    }
}
