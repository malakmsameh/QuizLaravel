<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\Lecturer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Courses>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
			'lecturer_id' => Lecturer::factory(),
            'course_code' => strtoupper(fake()->bothify('??###')), // e.g., CS101
            'title' => fake()->sentence(3),
            'credit_hours' => fake()->numberBetween(1, 4),
            'semester' => fake()->randomElement(['Fall 2026', 'Spring 2027', 'Summer 2027']),
        ];
    }
}
