<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

class studentController extends Controller
{
    // GET /students
    public function index(){
        $students = Student::all(); // Obtener todos los estudiantes

        if ($students->isEmpty()) {
            return response()->json(['message' => 'No students found'], 404);
        }

        return response()->json($students, 200);
    }

    // POST /students
    public function store(Request $request){
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:15',
            'language' => 'nullable|string|max:50', // Corrección: no debería ser 'date' si es lenguaje
        ])->validate();

        $student = Student::create($request->all());

        if (!$student) {
            return response()->json(['message' => 'Error creating student'], 500);
        }

        return response()->json($student, 201);
    }
}
