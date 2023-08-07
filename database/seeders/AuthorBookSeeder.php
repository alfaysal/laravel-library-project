<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $books = Book::all()->pluck('id')->toArray();
        $authors = Author::all()->pluck('id')->toArray();

        for ($i=0; $i < 10; $i++) { 
            $book_id = $faker->randomElement($books);
            $author_id = $faker->randomElement($authors);

            AuthorBook::create([
                'book_id' => $book_id,
                'author_id' => $author_id
            ]);
        }
    }
}
