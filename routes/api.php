<?php

use App\Http\Controllers\EnquirySubjectController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\YearController;
use App\Models\Enquiry;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('enquiry/subject/create', [EnquirySubjectController::class, 'apiCreate']);
Route::get('enquiry/subject/delete/{id}', [EnquirySubjectController::class, 'apiDelete']);
Route::get('/get/year/{id}', [YearController::class, 'getYear']);
Route::get('/get/subject/{id}', [SubjectsController::class, 'getSubject']);
Route::get('/get/student/{id}', [StudentsController::class, 'getStudent']);
Route::get('/get/student/data/{id}', [StudentsController::class, 'getStudentData']);
