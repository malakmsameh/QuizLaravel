<?php

namespace Database\Factories;

use App\Models\Lecture;
use App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lecture>
 */
class LectureFactory extends Factory
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
			'course_id' => Courses::factory(),
            'title' => 'Lecture ' . fake()->numberBetween(1, 15) . ': ' . fake()->sentence(2),
            'topic_summary' => fake()->paragraph(),
            'hall_name' => 'Hall ' . fake()->randomLetter(),
            'scheduled_at' => fake()->time('H:i:s'),
        ];
    }
}
