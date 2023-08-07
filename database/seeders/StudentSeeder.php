<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $departments = Department::all()->pluck('id')->toArray();

        for ($i=0; $i < 10; $i++) { 
            $department_id = $faker->randomElement($departments);

            Student::create([
                'department_id' => $department_id,
                'name' => $faker->name(),
                'roll' => rand(10,10000)
            ]);
        }
    }
}
