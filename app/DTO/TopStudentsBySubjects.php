<?php

namespace App\DTO;

class TopStudentsBySubjects
{
    public function __construct(
        public readonly string $subjectName,
        public readonly string $studentName,
        public readonly int $maxAverageGrade,
    ) {}
}
