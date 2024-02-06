<?php

namespace App\Services;

use App\Contracts\Repositories\GradeRepositoryInterface;
use App\DTO\Requests\AvgGradeStudentBySubjectParams;
use Illuminate\Support\Collection;

class ReportService
{
    public function __construct(
        protected GradeRepositoryInterface $gradeRepository
    )
    {
    }

    public function getAvgGradeStudentBySubject(AvgGradeStudentBySubjectParams $avgGradeStudentBySubjectParams): Collection
    {
        return $this->gradeRepository->getAvgGradeStudentBySubject($avgGradeStudentBySubjectParams);
    }

    public function getTopStudentsBySubjects(?string $dateFrom, ?string $dateTo): Collection
    {
        return $this->gradeRepository->getTopStudentsBySubjects($dateFrom,$dateTo);
    }

    public function getTopTeachersBySubject(?string $dateFrom, ?string $dateTo): Collection
    {
        return $this->gradeRepository->getTopTeachersBySubject($dateFrom,$dateTo);
    }
}
