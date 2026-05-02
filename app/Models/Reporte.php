<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Colonia;
use App\Models\User;

class Reporte extends Model
{
    use HasFactory;
     protected $table = 'reportes';

    protected $fillable = [
        'descripcion',
        'id_colonia',
        'id_chofer'
       
    ];

     // Asignar fecha automáticamente al crear
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($reporte) {
            $reporte->fecha_reporte = now(); 
        });
    }

    //Un reporte pertenece a una colonia
    public function colonia()
    {
        return $this->belongsTo(Colonia::class, 'id_colonia');
    }

    // Un reporte pertenece a un chofer (usuario con rol chofer)
    public function chofer()
    {
        return $this->belongsTo(User::class, 'id_chofer');
    }
}
