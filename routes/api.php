<?php

use App\Http\Controllers\CamionController;
use App\Http\Controllers\ChoferRutaCamionController;
use App\Http\Controllers\ColoniaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RutaController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {

    Route::get('/test', function () {
        return ['status' => 'API funcionando'];
    });

                                            // Rutas para gestión de colonias
    // Mostrar todas las colonias
    Route::get('/colonias', [ColoniaController::class, 'index']);
    // Crear una nueva colonia
    Route::post('/colonias', [ColoniaController::class, 'store']);
    // Mostrar una colonia por ID
    Route::get('/colonias/{id}', [ColoniaController::class, 'show']);
    // Actualizar una colonia
    Route::put('/colonias/{id}', [ColoniaController::class, 'update']);
    // Eliminar una colonia
    Route::delete('/colonias/{id}', [ColoniaController::class, 'destroy']);
    // Ruta extra: Colonias por ruta
    Route::get('/rutas/{id}/colonias', [ColoniaController::class, 'porRuta']);
    // Endpoint para cambiar SOLO el estado de una colonia (atendido / no atendido)
    Route::patch('/colonias/{id}/estado', [ColoniaController::class, 'actualizarEstado']);





                                            // Rutas para gestión de REPORTES
     // Mostrar todas las colonias
    Route::get('/reportes', [ReporteController::class, 'index']);
    // Crear una nueva colonia
    Route::get('/reportes/{id}', [ReporteController::class, 'show']);
    // Mostrar una colonia por ID
    Route::post('/reportes', [ReporteController::class, 'store']);
    // Actualizar una colonia
    Route::put('/reportes/{id}', [ReporteController::class, 'update']);
    // Eliminar una colonia
    Route::delete('/reportes/{id}', [ReporteController::class, 'destroy']);





                                            // CRUD DE CAMIONES

    Route::get('/camiones', [CamionController::class, 'index']);
    Route::post('/camiones', [CamionController::class, 'store']);
    Route::get('/camiones/{id}', [CamionController::class, 'show']);
    Route::put('/camiones/{id}', [CamionController::class, 'update']);
    Route::delete('/camiones/{id}', [CamionController::class, 'destroy']);


                                //CRUD DE RUTAS
    Route::get('/rutas', [RutaController::class, 'index']);
    Route::post('/rutas', [RutaController::class, 'store']);
    Route::get('/rutas/{id}', [RutaController::class, 'show']);
    Route::put('/rutas/{id}', [RutaController::class, 'update']);
    Route::delete('/rutas/{id}', [RutaController::class, 'destroy']);

    // Extras
    Route::get('/rutas/{id}/colonias', [RutaController::class, 'colonias']);
    Route::get('/rutas/{id}/dias', [RutaController::class, 'dias']);

    Route::get('/reportes', [ReporteController::class, 'index']);      // TODOS
    Route::get('/reportes/{id}', [ReporteController::class, 'show']);  // SOLO UNO
    Route::post('/reportes', [ReporteController::class, 'store']);     // CREAR
    Route::put('/reportes/{id}', [ReporteController::class, 'update']); // ACTUALIZAR
    Route::delete('/reportes/{id}', [ReporteController::class, 'destroy']); // ELIMINAR


    Route::get('/asignaciones', [ChoferRutaCamionController::class, 'index']);        // LISTAR
    Route::post('/asignaciones', [ChoferRutaCamionController::class, 'store']);      // CREAR
    Route::get('/asignaciones/{id}', [ChoferRutaCamionController::class, 'show']);   // MOSTRAR
    Route::put('/asignaciones/{id}', [ChoferRutaCamionController::class, 'update']); // ACTUALIZAR
    Route::delete('/asignaciones/{id}', [ChoferRutaCamionController::class, 'destroy']); // ELIMINAR
});