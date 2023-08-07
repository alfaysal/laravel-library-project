<?php

namespace App\Http\Services;

use App\Exceptions\MaximumBorrowBookException;
use App\Models\StudentBorrowBook;

class StudentBorrowBookValidationService{

    public function isApplicable(array $books): bool
    {
        return count($books) <= StudentBorrowBook::MAX_NUMBER_OF_BOOK_AT_A_TIME;   
    }

    public function doesStudentBookLimitIsOver(array $books): bool {
        if (!$this->isApplicable($books)) {
            throw new MaximumBorrowBookException('your book limit is over', 422);
        }
        return true;
    }

    // public function isStudentExists(int $id): bool // we can do this by findOrFail also
    // {
    //     return Student::find($id) ? true : false;
    // }

    // public function isBookExists(int $id): bool // we can do this by findOrFail also
    // {
    //     return Book::find($id) ? true : false;
    // }

    // public function doesStudentExistValidation(int $student_id) {
    //     if (!$this->isStudentExists($student_id)) {
    //         throw new StudentNotFoundException('student not found', 404);
    //     }

    //     return true;
    // }

    // public function bookValidate($id): bool {
    //     if (!$this->isBookExists($id)) {
    //         throw new BooksNotFoundException('book not found', 404);
    //     }
    //     return true;
    // }

}