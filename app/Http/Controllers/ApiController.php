<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ApiController extends Controller
{
    public function getAllStudents() {
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);
      }
  
      public function createStudent(Request $request) {
        $student = new Student;
        $student->name = $request->name;
        $student->course = $request->course;
        $student->save();

        return response()->json([
            "message" => "student record created"
        ], 201);
        
      }
  
      public function getStudent($id) {
        if (Student::where('id', $id)->exists()) {
          $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($student, 200);
        } else {
          return response()->json([
            "message" => "Student not found"
          ], 404);
        }
      }
  
      public function updateStudent(Request $request, $id) {
        if (Student::where('id', $id)->exists()) {
          $student = Student::find($id);
          $student->name = is_null($request->name) ? $student->name : $request->name;
          $student->course = is_null($request->course) ? $student->course : $request->course;
          $student->save();
  
          return response()->json([
              "message" => "records updated successfully"
          ], 200);
        } else {
          return response()->json([
              "message" => "Student not found"
          ], 404);
          
        }
      }
  
      public function deleteStudent ($id) {
        // logic to delete a student record goes here
      }
}
