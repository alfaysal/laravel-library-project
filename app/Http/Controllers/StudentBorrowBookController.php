<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentBorrowBookRequest;
use App\Http\Services\StudentBorrowBookService;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
        try {
            $this->student_borrow_book_service_obj->borrowBook($borrow_request->validated());

            return response()->json([
                'success' => true,
                'message' => "successfully booked ",
                'status_code' => 201
            ]);

        } catch (Throwable $e) {

            return response()->json([
                'success' => false,
                'error' => [
                    'message' => $e->getMessage(),
                    'status_code' => $e->getCode(),
                ]
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => [
                    'message' => $e->getMessage(),
                    'status_code' => $e->getCode()
                ]
            ]);
        }
    }

    public function getStudentBooks(Request $request, $student_id)
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
