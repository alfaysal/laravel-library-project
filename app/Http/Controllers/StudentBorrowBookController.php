<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentBorrowBookRequest;
use App\Http\Services\StudentBorrowBookService;
use App\Models\Author;
use App\Models\Book;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class StudentBorrowBookController extends Controller
{
    public function __construct(
        protected $student_borrow_book_service_obj = new StudentBorrowBookService() 
    )
    {
        
    }

    public function studentBorrowBook(StudentBorrowBookRequest $borrow_request): JsonResponse  
    {
        $this->student_borrow_book_service_obj->borrowBook($borrow_request->validated());

        return response()->json([
            'success' => true,
            'message' => "successfully booked ",
            'data' => null,
            'status_code' => 201
        ]);
    }

    public function getStudentBooks($student_id)
    {

        $student = Student::findOrFail($student_id);
        $get_response = $this->student_borrow_book_service_obj->getAllBorrowedBook($student->id);

        return response()->json([
            'success' => true,
            'message' => 'data is ready',
            'data' => $get_response,
            'status_code' => 200
        ]);
    }
}
