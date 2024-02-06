<?php

namespace App\Repositories;

use App\Contracts\Repositories\GradeRepositoryInterface;
use App\DTO\AvgGradeStudentBySubject;
use App\DTO\Requests\AvgGradeStudentBySubjectParams;
use App\DTO\TopStudentsBySubjects;
use App\DTO\TopTeacherBySubjects;
use App\Filters\AvgGradeStudentBySubjectFilter;
use App\Models\Grade;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GradeRepository implements GradeRepositoryInterface
{
    public function __construct(
        protected AvgGradeStudentBySubjectFilter $reportFilter
    )
    {
    }

    public function getAvgGradeStudentBySubject(AvgGradeStudentBySubjectParams $avgGradeStudentBySubjectParams, int $perPage = 100): Collection
    {
        $query = Grade::query()
            ->with(['student', 'subject'])
            ->select(['grades.student_id', 'grades.subject_id', DB::raw('AVG(grades.score) as average_grade')])
            ->join('students', 'grades.student_id', '=', 'students.id')
            ->join('subjects', 'grades.subject_id', '=', 'subjects.id');

        return (new AvgGradeStudentBySubjectFilter($query))
            ->apply($avgGradeStudentBySubjectParams->toArray())
            ->groupBy('grades.student_id','grades.subject_id')
            ->paginate($perPage)
            ->getCollection()->map(function ($item) {
                return new AvgGradeStudentBySubject(
                    studentName: $item->student->full_name,
                    subjectName: $item->subject->name,
                    averageGrade: (int) $item->average_grade,
                );
            });
    }

    public function getTopStudentsBySubjects(?string $dateFrom, ?string $dateTo, int $perPage = 100): Collection
    {
        return Grade::query()
            ->with('student', 'subject')
            ->select(['subject_id', 'student_id', DB::raw('AVG(score) as average_grade')])
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->dateFromFilter($dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->dateToFilter($dateTo);
            })
            ->groupBy('subject_id', 'student_id')
            ->orderBy('average_grade', 'desc')
            ->orderBy('student_id')
            ->paginate($perPage)->getCollection()->groupBy('subject_id')
            ->map(function ($students) {
                $topStudent = $students->first();
                return new TopStudentsBySubjects(
                    subjectName: $topStudent->subject->name,
                    studentName: $topStudent->student->full_name,
                    maxAverageGrade: (int) $topStudent->average_grade
                );
            });
    }

    public function getTopTeachersBySubject(?string $dateFrom, ?string $dateTo, int $perPage = 100): Collection
    {
        return Grade::query()
            ->with('student', 'subject','teacher')
            ->select(['subject_id', 'teacher_id','student_id', DB::raw('AVG(score) as average_grade')])
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->dateFromFilter($dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->dateToFilter($dateTo);
            })
            ->groupBy('subject_id', 'teacher_id','student_id')
            ->orderBy('average_grade', 'desc')
            ->orderBy('teacher_id')
            ->paginate($perPage)->getCollection()->groupBy('subject_id')
            ->map(function ($teachers) {
                $bestTeacher = $teachers->first();
                return new TopTeacherBySubjects(
                    subjectName: $bestTeacher->subject->name,
                    teacherName: $bestTeacher->teacher->full_name,
                    studentName: $bestTeacher->student->full_name,
                    maxAverageGrade: (int) $bestTeacher->average_grade
                );
            });
    }
}
