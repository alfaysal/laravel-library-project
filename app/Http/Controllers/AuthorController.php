<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getAuthors(){
        $get_response = Author::all();

        return response()->json([
            'success' => true,
            'message' => 'data is ready',
            'data' => $get_response,
            'status_code' => 200
        ]);
    }

    public function saveAuthor(Request $request) {
        $author = Author::create([
            "name" => $request->authorName,
            "phone" => $request->phone,
        ]);

        return response()->json([
            'success' => true,
            'data' => $author,
            'message' => "Successfully Save ",
            'status_code' => 201
        ]);
    }

    
}
