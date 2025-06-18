<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\studentController;

Route::get('/students', [studentController::class, 'index']);
Route::post('/students', [studentController::class, 'store']);

// Las siguientes rutas aún usan closures (funciones anónimas). Si luego las pasas a controlador, puedes organizarlas también.
Route::get('/students/{id}', function($id){
    return "Obteniendo estudiante con ID: " . $id;
});

Route::put('/students/{id}', function(Request $request, $id){
    return 'Actualizando estudiante con ID: ' . $id . ' con datos: ' . json_encode($request->all());
});

Route::delete('/students/{id}', function($id){
    return 'Eliminando estudiante con ID: ' . $id;
});
