<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

// Ruta para obtener todos los estudiantes
Route::get('/students', [StudentController::class, 'index']);

// Ruta para crear un estudiante
Route::post('/students', [StudentController::class, 'store']);

// Ruta para obtener un estudiante por ID
Route::get('/students/{id}', [StudentController::class, 'show']);

// Ruta para actualizar un estudiante
Route::put('/students/{id}', [StudentController::class, 'update']);

// Ruta para eliminar un estudiante
Route::delete('/students/{id}', [StudentController::class, 'destroy']);
