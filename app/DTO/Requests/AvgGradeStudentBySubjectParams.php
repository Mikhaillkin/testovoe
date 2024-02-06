<?php

namespace App\DTO\Requests;

class AvgGradeStudentBySubjectParams
{
    public function __construct(
        public readonly ?array  $subjectIds = null,
        public readonly ?string $dateFrom = null,
        public readonly ?string $dateTo = null,
        public readonly ?int $ageFrom = null,
        public readonly ?int $ageTo = null,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'dateFrom' => $this->dateFrom,
            'dateTo' => $this->dateTo,
            'subjectIds' => $this->subjectIds,
            'ageFrom' => $this->ageFrom,
            'ageTo' => $this->ageTo,
        ];
    }
}
