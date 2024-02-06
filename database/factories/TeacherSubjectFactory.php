<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherSubject>
 */
class TeacherSubjectFactory extends Factory
{
    private static array $teacherIds;
    private static array $subjectIds;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (empty(self::$teacherIds)) {
            self::$teacherIds = Teacher::pluck('id')->toArray();
        }

        if (empty(self::$subjectIds)) {
            self::$subjectIds = Subject::pluck('id')->toArray();
        }

        if (empty(self::$teacherIds) || empty(self::$subjectIds)) {
            return [];
        }

        return [
            'teacher_id' => $this->faker->randomElement(self::$teacherIds),
            'subject_id' => $this->faker->randomElement(self::$subjectIds),
        ];
    }
}
