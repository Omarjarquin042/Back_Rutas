<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Colonia; // Importación necesaria
use App\Models\ChoferRutaCamion; // Importación necesaria
use App\Models\RutaDia; // Importación necesaria

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'rutas';

    protected $fillable = [
        'nombre_ruta',  
        'turno' 
    ];

    public function colonias()
    {
        return $this->hasMany(Colonia::class, 'id_ruta'); 
    }
    
    public function choferesRutasCamiones(){
        return $this->hasMany(ChoferRutaCamion::class, 'id_ruta');
    }

    public function dias()
    {
        return $this->hasMany(RutaDia::class, 'id_ruta');
    }

}