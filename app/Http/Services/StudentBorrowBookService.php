<?php

namespace App\Http\Services;

use App\Exceptions\BooksCanNotBeEmptyException;
use App\Exceptions\BooksNotFoundException;
use App\Exceptions\MaximumBorrowBookException;
use App\Exceptions\StudentNotFoundException;
use App\Models\Book;
use App\Models\Student;
use App\Models\StudentBorrowBook;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Throwable;

class StudentBorrowBookService
{
    public function __construct(
        protected $validation_service_obj = new StudentBorrowBookValidationService()
    )
    {
        
    }
    public function saveBorrowedBook($borrow_book_data, int $book_id): ?Model
    {
        return StudentBorrowBook::create([
            'book_id' => $book_id,
            'student_id' => $borrow_book_data['student_id'],
            'issued_date' => $borrow_book_data['issued_date']
        ]);
    }

    public function borrowBook(array $borrow_book_data)
    {
        $books = $borrow_book_data['book_ids'];
        $student_is_applicable = $this->validation_service_obj->doesStudentBookLimitIsOver($books);

        if ($student_is_applicable) {

            DB::transaction(function() use ($books,$borrow_book_data) {
                for ($i=0; $i < count($books); $i++) {
                    if(!$this->saveBorrowedBook($borrow_book_data, $books[$i])){
                        throw new Exception();
                    }
                }
            });
        }
    }

    public function getAllBorrowedBook(int $student_id) : object 
    {
        return StudentBorrowBook::where('student_id',$student_id)->get();
    }
}