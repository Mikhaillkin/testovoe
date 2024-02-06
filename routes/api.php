<?php

use App\Http\Controllers\Api\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('reports')->group(function () {
    Route::post('avg-grade-student-by-subject',[ReportController::class,'getAvgGradeStudentBySubject']);
    Route::get('top-students-by-subjects',[ReportController::class,'getTopStudentsBySubjects']);
    Route::get('best-teachers-by-subject',[ReportController::class,'getTeachersBySubject']);
});
