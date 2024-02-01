<?php

namespace App\Http\Controllers\Api;

use App\Services\ReportService;

class ReportController
{
    public function __construct(
        protected ReportService $reportService
    )
    {
    }

    public function getStudentSubjectGrades()
    {
        $this->reportService->getStudentSubjectGrades();
    }

    public function getTopStudentsBySubject()
    {
        $this->reportService->getTopStudentsBySubject();
    }

    public function getTeachersBySubject()
    {
        $this->reportService->getTeachersBySubject();
    }
}
