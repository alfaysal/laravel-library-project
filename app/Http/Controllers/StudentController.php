<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function getStudents(){
        $get_response = DB::table('students')
                        ->join('departments','departments.id','students.department_id')
                        ->select('students.id','students.name','departments.name as department_name')
                        ->get();

        return response()->json([
            'success' => true,
            'message' => 'data is ready',
            'data' => $get_response,
            'status_code' => 200
        ]);
    }

    public function saveStudent(Request $request) {
        $student = Student::create([
            "name" => $request->studentName,
            "roll" => $request->studentRoll,
            "department_id" => $request->departmentId,
        ]);

        return response()->json([
            'success' => true,
            'data' => $student,
            'message' => "Successfully Save ",
            'status_code' => 201
        ]);
    }
}
