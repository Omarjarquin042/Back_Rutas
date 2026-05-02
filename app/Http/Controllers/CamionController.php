<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use Illuminate\Http\Request;

class CamionController extends Controller
{
 
    // Obtener todos los camiones
    public function index()
    {
        // Si quieres incluir relaciones: ->with('choferesRutasCamiones')->get()
        return Camion::all();
    }

    // Crear un camión
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
             'placas'   => 'required|string|max:255|unique:camion,placas',
            'modelo'   => 'required|string|max:255',
            'id_users' => 'required|exists:users,id'
        ]);

        // Crear el camión
        $camion = Camion::create($validated);

        return response()->json($camion, 201);
    }

    // Mostrar un camión por ID
    public function show($id)
    {
        $camion = Camion::find($id);

        if (!$camion) {
            return response()->json(['mensaje' => 'Camión no encontrado'], 404);
        }

        return response()->json($camion);
    }

    // Actualizar un camión
    public function update(Request $request, $id)
    {
        $camion = Camion::find($id);

        if (!$camion) {
            return response()->json(['mensaje' => 'Camión no encontrado'], 404);
        }

        $validated = $request->validate([
            'placas'   => "sometimes|string|max:255|unique:camion,placas,$id",
            'modelo'   => 'sometimes|string|max:255',
            'id_users' => 'sometimes|exists:users,id'
        ]);

        $camion->update($validated);

        return response()->json($camion);
    }

    // Eliminar un camión
    public function destroy($id)
    {
        $camion = Camion::find($id);

        if (!$camion) {
            return response()->json(['mensaje' => 'Camión no encontrado'], 404);
        }

        $camion->delete();
            return response()->json(['mensaje' => 'Camión eliminado correctamente']);
    }

}
