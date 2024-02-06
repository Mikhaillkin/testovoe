<?php

namespace App\DTO;

class AvgGradeStudentBySubject
{
    public function __construct(
        public readonly string $studentName,
        public readonly string $subjectName,
        public readonly int $averageGrade,
    ) {}
}
