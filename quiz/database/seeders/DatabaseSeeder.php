<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lecturer;
use App\Models\Courses;
use App\Models\Lecture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(5)->create();

        // 2. Create 3 Lecturers (each gets a brand new User automatically)
        Lecturer::factory(3)->create();

        // 3. Create 5 Courses (each gets attached to a random Lecturer)
        Courses::factory(5)->create();

        // 4. Create 10 Lectures (each gets attached to a random Course)
        Lecture::factory(10)->create();
    }
}
