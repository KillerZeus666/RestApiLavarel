<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

class StudentController extends Controller
{
    // GET /api/students
    public function index(){
        $students = Student::all();

        if ($students->isEmpty()) {
            return response()->json(['message' => 'No students found'], 404);
        }

        return response()->json($students, 200);
    }

    // POST /api/students
    public function store(Request $request){
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:15',
            'language' => 'nullable|string|max:50',
        ])->validate();

        $student = Student::create($request->all());

        return response()->json($student, 201);
    }

    // GET /api/students/{id}
    public function show($id){
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return response()->json($student, 200);
    }

    // PUT /api/students/{id}
    public function update(Request $request, $id){
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:students,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'language' => 'nullable|string|max:50',
        ])->validate();

        $student->update($request->all());

        return response()->json($student, 200);
    }

    // DELETE /api/students/{id}
    public function destroy($id){
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}
