<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student; // Importar el modelo Student


class studentController extends Controller
{
    public function index(){
        Student::all(); // Obtener todos los estudiantes
        return response()->json(Student::all(), 200); // Retornar la lista de estudiantes en formato JSON
    }

}
