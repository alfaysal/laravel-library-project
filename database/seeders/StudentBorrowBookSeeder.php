<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Student;
use App\Models\StudentBorrowBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentBorrowBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $books = Book::all()->pluck('id')->toArray();
        $students = Student::all()->pluck('id')->toArray();

        for ($i=0; $i < 10; $i++) { 
            $book_id = $faker->randomElement($books);
            $student_id = $faker->randomElement($students);

            StudentBorrowBook::create([
                'book_id' => $book_id,
                'student_id' => $student_id,
                'issued_date' => $faker->dateTimeThisMonth()
            ]);
        }
    }
}
