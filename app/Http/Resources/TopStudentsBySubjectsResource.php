<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopStudentsBySubjectsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'subject_name' => $this->subjectName,
            'student_name' => $this->studentName,
            'max_avg_grade' => $this->maxAverageGrade
        ];
    }
}
