<?php

namespace App\Contracts\Repositories;

use App\DTO\Requests\AvgGradeStudentBySubjectParams;
use Illuminate\Support\Collection;

interface GradeRepositoryInterface
{
    public function getAvgGradeStudentBySubject(AvgGradeStudentBySubjectParams $avgGradeStudentBySubjectParams,  int $perPage): Collection;

    public function getTopStudentsBySubjects(?string $dateFrom, ?string $dateTo,  int $perPage): Collection;

    public function getTopTeachersBySubject(?string $dateFrom, ?string $dateTo,  int $perPage): Collection;

}
