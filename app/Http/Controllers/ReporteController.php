<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    //  Obtener todos los reportes
    public function index()
    {
        return Reporte::with(['colonia.ruta', 'chofer'])->get();
    }


    // Crear un reporte nuevo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string',
            'id_colonia'  => 'required|exists:colonias,id',
            'id_chofer'   => 'required|exists:users,id'
        ]);
        
        $reporte = Reporte::create($validated);

        return response()->json($reporte, 201);
    }


    // Mostrar un reporte por ID
    public function show($id)
    {
        $reporte = Reporte::with(['colonia.ruta', 'chofer'])->find($id);

        if (!$reporte) {
            return response()->json(['mensaje' => 'Reporte no encontrado'], 404);
        }

        return response()->json($reporte);
    }


    // Actualizar un reporte existente
    public function update(Request $request, $id)
    {
        $reporte = Reporte::find($id);

        if (!$reporte) {
            return response()->json(['mensaje' => 'Reporte no encontrado'], 404);
        }

        $validated = $request->validate([
            'descripcion' => 'sometimes|string',
            'id_colonia'  => 'sometimes|exists:colonias,id',
            'id_chofer'   => 'sometimes|exists:users,id'
        ]);

        $reporte->update($validated);

        return response()->json($reporte);
    }


    // Eliminar un reporte
    public function destroy($id)
    {
        $reporte = Reporte::find($id);

        if (!$reporte) {
            return response()->json(['mensaje' => 'Reporte no encontrado'], 404);
        }

        $reporte->delete();

        return response()->json(['mensaje' => 'Reporte eliminado']);
    
    }


}
