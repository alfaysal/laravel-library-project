<?php

namespace App\Jobs;

use App\Models\Book;
use App\Models\StudentBorrowBook;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BookStatusUpdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // public $student_borrow_book;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        // $this->student_borrow_book = $student_borrow_book;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        for($i = 0; $i < 10; $i++) {
            $Book = Book::create([
                "name" => "null". $i,
                "isbn" => $i,
                "is_hold" => 0
            ]);
        }
    }
}
