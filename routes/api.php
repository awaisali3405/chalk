<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\EnquirySubjectController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StaffController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('enquiry/subject/create', [EnquirySubjectController::class, 'apiCreate']);
Route::get('enquiry/subject/delete/{id}', [EnquirySubjectController::class, 'apiDelete']);
Route::get('enquiry/subject/deactivate/{id}', [EnquirySubjectController::class, 'deactivate']);
Route::get('/get/year/{id}', [YearController::class, 'getYear']);
Route::get('/get/subject/{id}', [SubjectController::class, 'getSubject']);
Route::get('/get/subject/{id}/value', [SubjectController::class, 'getSubjectValue']);
Route::get('/get/student/{id}', [StudentsController::class, 'getStudent']);
Route::get('/get/student/{id}/{branch}', [StudentsController::class, 'getStudentBranch']);
Route::get('/get/student1/data1/{id}', [StudentsController::class, 'getStudentData']);
Route::get('/get/parent/data/{id}', [ParentController::class, 'getParentData']);
Route::get('/get/product/{year}/{branch}', [ProductController::class, 'getProduct']);
Route::get('/get/branch/{id}', [BranchController::class, 'getBranch']);
Route::post('/get/salary', [StaffController::class, 'getAttendance']);
Route::get('get/staff/{id}/general', [StaffController::class, 'getStaff']);
Route::get('get/staff/{id}', [LoanController::class, 'getStaff']);
Route::get('get/people/{id}', [NotificationController::class, 'getPeople']);
Route::get('get/event', [EventController::class, 'getEvent']);
Route::get('get/resource/data/{id}', [SaleController::class, 'getData']);
