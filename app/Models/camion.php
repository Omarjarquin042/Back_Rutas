<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ChoferRutaCamion;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Camion extends Model
{
    use HasFactory;
    protected $table = 'camion';

    protected $fillable = [
        'placas',
        'modelo',
        'id_users'
    ];

    public function choferesRutasCamiones()
    {
        return $this->hasMany(ChoferRutaCamion::class, 'id_camion');
    }
}
