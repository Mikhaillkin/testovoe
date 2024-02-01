<?php

use App\Http\Controllers\Api\ReportController;
use Illuminate\Http\Request;
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
    Route::get('student-subject-grades',[ReportController::class,'getStudentSubjectGrades']);
    Route::get('top-students-by-subject',[ReportController::class,'getTopStudentsBySubject']);
    Route::get('best-teachers-by-subject',[ReportController::class,'getTeachersBySubject']);
});
