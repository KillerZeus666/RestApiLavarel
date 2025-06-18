<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

        if ($students->isEmpty()) {
            return response()->json(['message' => 'No students found'], 404);
        }

        return response()->json($students, 200);
    }

    public function store(Request $request){
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:15',
            'language' => 'nullable|string|max:50',
        ])->validate();

        $student = Student::create($request->all());

        if (!$student) {
            return response()->json(['message' => 'Error creating student'], 500);
        }

        return response()->json($student, 201);
    }
}
