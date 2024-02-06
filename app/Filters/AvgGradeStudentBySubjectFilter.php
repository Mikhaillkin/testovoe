<?php

namespace App\Filters;

class AvgGradeStudentBySubjectFilter extends BaseFilter
{
    protected function dateFrom(string $dateFrom): void
    {
        $this->query->where('grades.date', '>=', $dateFrom);
    }

    protected function dateTo(string $dateTo): void
    {
        $this->query->where('grades.date', '<=', $dateTo);
    }

    protected function subjectIds(array $subjectIds): void
    {
        $this->query->whereIn('subjects.id', $subjectIds);
    }

    protected function ageFrom(int $ageFrom): void
    {
        $this->query->whereRaw("EXTRACT(YEAR FROM age(current_date, students.birth_date)) >= ?", [$ageFrom]);
    }

    protected function ageTo(int $ageTo): void
    {
        $this->query->whereRaw("EXTRACT(YEAR FROM age(current_date, students.birth_date)) <= ?", [$ageTo]);
    }
}
