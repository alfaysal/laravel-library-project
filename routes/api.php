<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentBorrowBookController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function (){

    Route::post(
        '/students/books',
        [StudentBorrowBookController::class, 'studentBorrowBook']
    )->name('student-borrow-book');

    Route::get(
        '/students/{id}/books',
        [StudentBorrowBookController::class, 'getStudentBooks']
    )->name('student-borrowed-book');

    Route::post(
        '/books',
        [BookController::class, 'saveBook']
    )->name('save-book');

    Route::get(
        '/books',
        [BookController::class, 'getBooks']
    )->name('get-book');

    Route::get(
        '/authors',
        [AuthorController::class, 'getAuthors']
    )->name('get-book');

    Route::post(
        '/authors',
        [AuthorController::class, 'saveAuthor']
    )->name('save-author');

    Route::get(
        '/departments',
        [DepartmentController::class, 'getDepartments']
    )->name('get-departments');

    Route::post(
        '/departments',
        [DepartmentController::class, 'saveDepartment']
    )->name('save-departments');

    Route::get(
        '/students',
        [StudentController::class, 'getStudents']
    )->name('get-students');

    Route::post(
        '/students',
        [StudentController::class, 'saveStudent']
    )->name('save-student');

    Route::get(
        '/books/{book_name}',
        [BookController::class, 'getBooksByName']
    )->name('get-books-by-name');
    

});
