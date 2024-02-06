<?php

namespace App\Http\Controllers\Api;

use App\DTO\Requests\AvgGradeStudentBySubjectParams;
use App\Http\Requests\AvgGradeStudentBySubjectRequest;
use App\Http\Requests\TopStudentsBySubjectsRequest;
use App\Http\Requests\TopTeachersBySubjectRequest;
use App\Http\Resources\AvgGradeStudentBySubjectResource;
use App\Http\Resources\TopStudentsBySubjectsResource;
use App\Http\Resources\TopTeachersBySubjectResource;
use App\Services\ReportService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ReportController
{
    public function __construct(
        protected ReportService $reportService
    )
    {
    }

    public function getAvgGradeStudentBySubject(AvgGradeStudentBySubjectRequest $request): AnonymousResourceCollection
    {
        return AvgGradeStudentBySubjectResource::collection($this->reportService->getAvgGradeStudentBySubject(
            new AvgGradeStudentBySubjectParams(
                subjectIds: $request->validated('subject_ids'),
                dateFrom: $request->validated('date_from'),
                dateTo: $request->validated('date_to'),
                ageFrom: $request->validated('age_from'),
                ageTo: $request->validated('age_to'),
            )
        ));
    }

    public function getTopStudentsBySubjects(TopStudentsBySubjectsRequest $request): AnonymousResourceCollection
    {
        return  TopStudentsBySubjectsResource::collection($this->reportService->getTopStudentsBySubjects(
            $request->validated('date_from'),
            $request->validated('date_to'),
        ));
    }

    public function getTeachersBySubject(TopTeachersBySubjectRequest $request): AnonymousResourceCollection
    {
        return TopTeachersBySubjectResource::collection(
            $this->reportService->getTopTeachersBySubject(
                $request->validated('date_from'),
                $request->validated('date_to'),
            )
        );
    }
}
