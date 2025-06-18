<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

// Ruta para obtener todos los estudiantes (GET)
Route::get('/students', [StudentController::class, 'index']);

// Ruta para crear un estudiante (POST)
Route::post('/students', [StudentController::class, 'store']);

// Ruta para obtener un estudiante por ID (ejemplo simple)
Route::get('/students/{id}', function($id){
    return "Obteniendo estudiante con ID: " . $id;
});

// Ruta para actualizar un estudiante (PUT)
Route::put('/students/{id}', function(Request $request, $id){
    return 'Actualizando estudiante con ID: ' . $id . ' con datos: ' . json_encode($request->all());
});

// Ruta para eliminar un estudiante (DELETE)
Route::delete('/students/{id}', function($id){
    return 'Eliminando estudiante con ID: ' . $id;
});
