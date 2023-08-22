<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function saveBook(Request $request) {
        $book = Book::create([
            "name" => $request->bookName,
            "isbn" => $request->isbn,
            "is_hold" => 0
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                "name" => $request->bookName,
                "isbn" => $request->isbn,
            ],
            'message' => "successfully booked ",
            'status_code' => 201
        ]);
    }

    public function getBooks(){
        $get_response = Book::all();

        return response()->json([
            'success' => true,
            'message' => 'data is ready',
            'data' => $get_response,
            'status_code' => 200
        ]);
    }


    public function getBooksByName($book_name){
        $books = Book::where('name','like','%' . $book_name . '%')->get();

        return response()->json([
            'success' => true,
            'message' => 'data is ready',
            'data' => $books,
            'status_code' => 200
        ]);
    }

   
}
