<?php

namespace App\DTO;

class TopTeacherBySubjects
{
    public function __construct(
        public readonly string $subjectName,
        public readonly string $teacherName,
        public readonly string $studentName,
        public readonly int $maxAverageGrade,
    ) {}
}
