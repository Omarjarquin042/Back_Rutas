<?php

namespace App\Http\Controllers;

use App\Models\ChoferRutaCamion;
use Illuminate\Http\Request;

class ChoferRutaCamionController extends Controller
{
    // Listar todoas las asignaciones
    public function index()
    {
        return ChoferRutaCamion::with(['user', 'ruta', 'camion'])->get();
    }

    //Crear una nueva asignacion
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user'   => 'required|exists:users,id',
            'id_ruta'   => 'required|exists:rutas,id',
            'id_camion' => 'required|exists:camion,id', // tu tabla es "camion"
            'fecha'     => 'nullable|date',
            'estado'    => 'nullable|in:asignado,completado'
        ]);

        $asignacion = ChoferRutaCamion::create($validated);

        return response()->json([
            'mensaje' => 'Asignación creada con éxito',
            'data' => $asignacion
        ], 201);
    }

    // Mostrar una asignacion por ID
    public function show($id)
    {
        $asignacion = ChoferRutaCamion::with(['user', 'ruta', 'camion'])->find($id);

        if (!$asignacion) {
            return response()->json(['mensaje' => 'Asignación no encontrada'], 404);
        }

        return response()->json($asignacion);
    }

    //actualizar una asignacion
    public function update(Request $request, $id)
    {
        $asignacion = ChoferRutaCamion::find($id);

        if (!$asignacion) {
            return response()->json(['mensaje' => 'Asignación no encontrada'], 404);
        }

        $validated = $request->validate([
            'id_user'   => 'sometimes|exists:users,id',
            'id_ruta'   => 'sometimes|exists:rutas,id',
            'id_camion' => 'sometimes|exists:camion,id',
            'fecha'     => 'sometimes|date',
            'estado'    => 'sometimes|in:asignado,completado'
        ]);

        $asignacion->update($validated);

        return response()->json([
            'mensaje' => 'Asignación actualizada con éxito',
            'data' => $asignacion
        ]);
    }

   //eliminar una asignacion
    public function destroy($id)
    {
        $asignacion = ChoferRutaCamion::find($id);

        if (!$asignacion) {
            return response()->json(['mensaje' => 'Asignación no encontrada'], 404);
        }

        $asignacion->delete();

        return response()->json(['mensaje' => 'Asignación eliminada']);
    }
}
