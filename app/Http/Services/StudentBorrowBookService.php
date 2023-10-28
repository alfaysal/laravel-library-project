<?php

namespace App\Http\Services;

use App\Events\StudentBorrowBookEvent;
use App\Exceptions\BooksCanNotBeEmptyException;
use App\Exceptions\BooksNotFoundException;
use App\Exceptions\MaximumBorrowBookException;
use App\Exceptions\StudentNotFoundException;
use App\Jobs\BookStatusUpdateJob;
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
                    $student_borrow_book = $this->saveBorrowedBook($borrow_book_data, $books[$i]);
                    if(!$student_borrow_book){
                        throw new Exception();
                    }

                    StudentBorrowBookEvent::dispatch($student_borrow_book);
                }
            });
        }
        BookStatusUpdateJob::dispatch();
    }

    public function getAllBorrowedBook(int $student_id) : object 
    {
        return DB::table('student_borrow_books')
                    ->join('books','books.id','student_borrow_books.book_id')
                    ->join('students','students.id','student_borrow_books.student_id')
                    ->select('student_borrow_books.id','students.name as studentName','books.name as bookName','student_borrow_books.issued_date as issuedDate')
                    ->where('student_borrow_books.student_id',$student_id)
                    ->get();
    }
}