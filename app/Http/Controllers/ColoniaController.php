<?php

namespace App\Http\Controllers;

use App\Models\Colonia;
use Illuminate\Http\Request;

class ColoniaController extends Controller
{   
    // Obtener todas las colonias (con la información de su ruta)
    public function index()
    {
       return Colonia::with('ruta')->get();//informacion de la colonia 
    }

    // Cambiar solo el estado de una colonia
    public function actualizarEstado(Request $request, $id)
    {
        $colonia = Colonia::find($id);
        if (!$colonia) {
        return response()->json(['mensaje' => 'Colonia no encontrada'], 404);
    }

    // Validar solo el estado
    $validated = $request->validate([
        'estado' => 'required|in:atendido,no atendido'
    ]);

    // Actualizar el estado
    $colonia->estado = $validated['estado'];
    $colonia->save();

    return response()->json([
        'mensaje' => 'Estado actualizado correctamente',
        'colonia' => $colonia
    ]);
}

    public function porRuta($id)
    {
        return Colonia::where('id_ruta', $id)->get();
    }


    // Crear una nueva colonia
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'calle' => 'required|string|max:255',
            'numero_calle' => 'required|integer',
            'prioridad' => 'required|in:muy alta,alta,baja',
            'estado' => 'required|in:atendido,no atendido',
            'id_ruta' => 'required|exists:rutas,id'
        ]);


        // Crear colonia
        $colonia = Colonia::create($validated);

        return response()->json($colonia, 201);
    }
    

    // Mostrar una colonia por ID
    public function show($id)
    {
        // Buscar colonia junto con su ruta
        $colonia = Colonia::with('ruta')->find($id);
        if (!$colonia) {
            return response()->json(['mensaje' => 'Colonia no encontrada'], 404);
        } 

        return response()->json($colonia);   
    }

    // Actualizar una colonia existente
    public function update(Request $request, $id)
    {
        $colonia = Colonia::find($id);
        if (!$colonia) {
        return response()->json(['mensaje' => 'Colonia no encontrada'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'calle' => 'sometimes|string|max:255',
            'numero_calle' => 'sometimes|integer',
            'prioridad' => 'sometimes|in:muy alta,alta,baja',
            'estado' => 'sometimes|in:atendido,no atendido',
            'id_ruta' => 'sometimes|exists:rutas,id'
        ]);

        $colonia->update($validated);

        return response()->json($colonia);
        
    }

    // Eliminar una colonia
    public function destroy($id)
    {
        $colonia = Colonia::find($id);
        if (!$colonia) {
            return response()->json(['mensaje' => 'Colonia no encontrada'], 404);
        }

        $colonia->delete();
         return response()->json(['mensaje' => 'Colonia eliminada']);
        
    }
    

}
