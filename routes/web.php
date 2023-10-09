<?php

use App\Http\Controllers\AcademicCalenderController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\KeyStageController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ScienceTypeController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\YearController;
use App\Models\AcademicCalender;
use App\Models\Board;
use App\Models\Branch;
use App\Models\Enquiry;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::resource('branch', BranchController::class);
    Route::resource('keyStage', KeyStageController::class);
    Route::resource('year', YearController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('board', BoardController::class);
    Route::resource('paper', PaperController::class);
    Route::resource('scienceType', ScienceTypeController::class);
    Route::resource('academicCalender', AcademicCalenderController::class);
    Route::resource('student', studentController::class);
    Route::resource('enquiry', EnquiryController::class);
    Route::get('/enquiry/{id}/note', [EnquiryController::class, 'note'])->name('enquiry.note');
    Route::get('/enquiry/{id}/upload', [EnquiryController::class, 'upload'])->name('enquiry.upload');
    Route::get('/enquiry/{id}/upload/delete', [EnquiryController::class, 'uploadDelete'])->name('enquiry.upload.delete');
    Route::get('/enquiry/{id}/note', [EnquiryController::class, 'note'])->name('enquiry.note');
    Route::get('/enquiry/{id}/register', [EnquiryController::class, 'register'])->name('enquiry.register');
    Route::post('/enquiry/{id}/note', [EnquiryController::class, 'noteStore'])->name('enquiry.note.store');
    Route::post('/enquiry/upload', [EnquiryController::class, 'uploadStore'])->name('enquiry.upload.store');
    Route::get('/student/{id}/note', [studentController::class, 'note'])->name('student.note');
    Route::get('/student/{id}/upload', [studentController::class, 'upload'])->name('student.upload');
    Route::get('/student/{id}/upload/delete', [studentController::class, 'uploadDelete'])->name('student.upload.delete');
    Route::get('/student/{id}/note', [studentController::class, 'note'])->name('student.note');
    Route::post('/student/{id}/note', [studentController::class, 'noteStore'])->name('student.note.store');
    Route::post('/student/upload', [studentController::class, 'uploadStore'])->name('student.upload.store');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
