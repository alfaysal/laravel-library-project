<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBorrowBook extends Model
{
    use HasFactory;

    public const MAX_NUMBER_OF_BOOK_AT_A_TIME = 3;

    protected $fillable = [
        'student_id',
        'book_id',
        'issued_date'
    ];
}
