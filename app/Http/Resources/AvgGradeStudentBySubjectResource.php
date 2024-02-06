<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AvgGradeStudentBySubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'student_name' => $this->studentName,
            'subject_name' => $this->subjectName,
            'average_grade' => $this->averageGrade,
        ];
    }
}
