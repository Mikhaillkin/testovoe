<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentSubject>
 */
class StudentSubjectFactory extends Factory
{
    private static array $studentIds;
    private static array $subjectIds;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (empty(self::$studentIds)) {
            self::$studentIds = Student::pluck('id')->toArray();
        }

        if (empty(self::$subjectIds)) {
            self::$subjectIds = Subject::pluck('id')->toArray();
        }

        if (empty(self::$studentIds) || empty(self::$subjectIds)) {
            return [];
        }

        return [
            'student_id' => $this->faker->randomElement(self::$studentIds),
            'subject_id' => $this->faker->randomElement(self::$subjectIds),
        ];
    }
}
