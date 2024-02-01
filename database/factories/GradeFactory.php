<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('2019-01-01', '2023-12-31'),
            'score' => $this->faker->numberBetween(1, 100),
            'student_id' => Student::inRandomOrder()->first()?->id,
            'subject_id' => Subject::inRandomOrder()->first()?->id,
            'teacher_id' => Teacher::inRandomOrder()->first()?->id,
        ];
    }
}
