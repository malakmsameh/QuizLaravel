<?php

namespace Database\Factories;

use App\Models\Lecturer;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lecturer>
 */
class LecturerFactory extends Factory
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
			'user_id' => User::factory(),
            'employee_number' => 'EMP-' . fake()->unique()->numerify('#####'),
            'department' => fake()->randomElement(['Computer Science', 'Mathematics', 'Physics', 'Engineering']),
            'office_room' => 'Room ' . fake()->numberBetween(100, 500),
            'photo' => null, // We'll leave this null
            'isActivated' => 'isActivated',
            'academic_rank' => fake()->randomElement(['Professor', 'Associate Professor', 'Assistant Professor', 'Senior Lecturer']),
        ];
    }
}
