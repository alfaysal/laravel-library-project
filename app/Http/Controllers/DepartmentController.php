<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function getDepartments(){
        $get_response = Department::all();

        return response()->json([
            'success' => true,
            'message' => 'data is ready',
            'data' => $get_response,
            'status_code' => 200
        ]);
    }

    public function saveDepartment(Request $request) {
        $department = Department::create([
            "name" => $request->departmentName,
        ]);

        return response()->json([
            'success' => true,
            'data' => $department,
            'message' => "Successfully Save ",
            'status_code' => 201
        ]);
    }
}
