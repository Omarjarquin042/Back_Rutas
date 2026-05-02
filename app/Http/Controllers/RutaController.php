<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use Illuminate\Http\Request;
// Asegúrate de importar los demás controladores si los usas aquí, aunque no se muestren

class RutaController extends Controller
{
    // Obtener todas las rutas (CORREGIDO: Solo se retorna la ruta principal por seguridad)
    public function index()
    {
        // Se retorna Ruta::all() para asegurar que los datos básicos de la tabla 'rutas'
        // lleguen al frontend, eliminando la carga de relaciones que fallaba silenciosamente.
        return Ruta::all();
    }

    // ... (El resto del código como store, show, update, destroy, colonias y dias permanece igual)

    // ... (El resto del código)

}