<?php

namespace App\Listeners;

use App\Models\Book;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BookUpdateStatusListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $book = Book::find($event->student_borrow_book['book_id']);
        
        $book->update([
            "is_hold"  =>  1
        ]);

    }
}
