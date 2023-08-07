<?php

use App\Http\Controllers\StudentBorrowBookController;
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
});
