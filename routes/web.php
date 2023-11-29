<?php

use App\Http\Controllers\AcademicCalenderController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BalanceSheetController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExpenseAccountTypeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GenerateSalaryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KeyStageController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ScienceTypeController;


use App\Http\Controllers\SMSController;
use App\Http\Controllers\StaffAttendanceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SupplierControlller;
use App\Http\Controllers\TaxFlowController;
use App\Http\Controllers\TeacherEnquiryController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\YearController;
use App\Models\ExpenseAccountType;
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

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('branch', BranchController::class);
    Route::resource('keyStage', KeyStageController::class);
    Route::resource('year', YearController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('board', BoardController::class);
    Route::resource('paper', PaperController::class);
    Route::resource('scienceType', ScienceTypeController::class);
    Route::resource('academicCalender', AcademicCalenderController::class);
    // Student
    Route::resource('student', StudentsController::class);
    Route::get('student/statement/{id}', [StudentsController::class, 'statementPrint'])->name('student.statement');
    Route::get('student/{id}/attendance', [StudentsController::class, 'show'])->name('attendance.student.detail');
    Route::get('/student/{id}/note', [StudentsController::class, 'note'])->name('student.note');
    Route::get('/student/{id}/upload', [StudentsController::class, 'upload'])->name('student.upload');
    Route::get('/student/{id}/upload/delete', [StudentsController::class, 'uploadDelete'])->name('student.upload.delete');
    Route::get('/student/{id}/note', [StudentsController::class, 'note'])->name('student.note');
    Route::post('/student/{id}/note', [StudentsController::class, 'noteStore'])->name('student.note.store');
    Route::post('/student/upload', [StudentsController::class, 'uploadStore'])->name('student.upload.store');
    Route::get('/student/request/parent', [StudentsController::class, 'request'])->name('student.request');
    Route::post('/student/promote/{id}', [StudentsController::class, 'promote'])->name('student.promote');
    Route::get('/disable/student', [StudentsController::class, 'disable'])->name('student.disable');
    // Enquiry
    Route::resource('enquiry', EnquiryController::class);
    Route::get('/enquiry/{id}/note', [EnquiryController::class, 'note'])->name('enquiry.note');
    Route::get('/enquiry/{id}/upload', [EnquiryController::class, 'upload'])->name('enquiry.upload');
    Route::get('/enquiry/{id}/upload/delete', [EnquiryController::class, 'uploadDelete'])->name('enquiry.upload.delete');
    Route::get('/enquiry/{id}/note', [EnquiryController::class, 'note'])->name('enquiry.note');
    Route::get('/enquiry/{id}/register', [EnquiryController::class, 'register'])->name('enquiry.register');
    Route::post('/enquiry/{id}/note', [EnquiryController::class, 'noteStore'])->name('enquiry.note.store');
    Route::post('/enquiry/upload', [EnquiryController::class, 'uploadStore'])->name('enquiry.upload.store');
    // Invoice
    Route::resource('invoice', InvoiceController::class);
    Route::post('invoice/group/generate', [InvoiceController::class, 'groupInvoice'])->name('group.invoice');
    Route::get('invoice/pdf/{id}', [InvoiceController::class, 'print'])->name('invoice.print');
    Route::get('invoice/due/payment', [InvoiceController::class, 'dueStudent'])->name('invoice.due');

    Route::resource('receipt', ReceiptController::class);
    // Product
    Route::resource('product', ProductController::class);
    Route::get('/product/transfer/{id}', [ProductController::class, 'transfer'])->name('product.transfer');
    Route::post('/product/transfer/{id}/store', [ProductController::class, 'transferPost'])->name('product.transfer.store');

    Route::resource('purchase', PurchaseController::class);
    Route::resource('sale', SaleController::class);
    Route::resource('supplier', SupplierControlller::class);
    Route::resource('parent', ParentController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::resource('balanceSheet', BalanceSheetController::class);


    Route::resource('refund', RefundController::class);
    Route::get('/paid-by-cash/{id}', [RefundController::class, 'paidByBank'])->name('refund.paid.bank');
    Route::get('/paid-by-bank/{id}', [RefundController::class, 'paidByCash'])->name('refund.paid.cash');



    // Expense Account Type
    Route::resource('expenseTypeAccount', ExpenseAccountTypeController::class);
    Route::resource('expense', ExpenseController::class);

    // Teacher Enquiry
    Route::resource('enquiryTeacher', TeacherEnquiryController::class);
    Route::get('enquiry/upload/{id}', [TeacherEnquiryController::class, 'upload'])->name('enquiryTeacher.upload');
    Route::post('enquiry/upload/{id}', [TeacherEnquiryController::class, 'uploadStore'])->name('enquiryTeacher.upload.store');
    Route::post('enquiry/staff/register/{id}', [TeacherEnquiryController::class, 'registerPost'])->name('staff.register');
    Route::get('enquiry/registration/{id}', [TeacherEnquiryController::class, 'register'])->name('enquiryTeacher.registration');
    Route::post('enquiry/interview/{id}/send', [TeacherEnquiryController::class, 'sendInterview'])->name('enquiry.send.interview');
    Route::get('enquiry/note/{id}', [TeacherEnquiryController::class, 'note'])->name('enquiryTeacher.note');
    Route::get('enquiry/payroll/{id}', [TeacherEnquiryController::class, 'payroll'])->name('enquiryTeacher.payroll');
    Route::post('enquiry/payroll/{id}/store', [TeacherEnquiryController::class, 'payrollStore'])->name('enquiryTeacher.payroll.store');
    Route::get('enquiry/payroll/{id}/delete', [TeacherEnquiryController::class, 'payrollDelete'])->name('enquiryTeacher.payroll.delete');
    Route::post('enquiry/note/{id}', [TeacherEnquiryController::class, 'notePost'])->name('enquiryTeacher.note.store');
    // Staff
    Route::resource('staff', StaffController::class);
    Route::get('staff/attendance/{id}', [StaffController::class, 'attendance'])->name('staff.attendance.index');
    Route::post('staff/{id}/attendance/create', [StaffController::class, 'attendanceStore'])->name('staff.attendance.store');
    Route::post('staff/attendance/{id}/update', [StaffController::class, 'attendanceUpdate'])->name('staff.attendance.update');
    Route::get('staff/attendance/{id}/delete', [StaffController::class, 'attendanceDelete'])->name('staff.attendance.delete');
    Route::get('staff/pay/{id}', [StaffController::class, 'pay'])->name('staff.pay');
    Route::get('staff/invoice/pay/{id}', [StaffController::class, 'invoicePay'])->name('staff.invoice.pay');
    Route::get('staff/statement/{id}', [StaffController::class, 'statement'])->name('staff.statement');
    Route::post('staff/pay/store', [StaffController::class, 'payStore'])->name('staff.pay.store');

    // Event Calender
    Route::resource('eventCalender', EventController::class);
    // Generate Salary
    Route::resource('generateSalary', GenerateSalaryController::class);
    // General Notification
    Route::resource('generalNotification', NotificationController::class);
    // Staff Attendance
    Route::resource('staffAttendance', StaffAttendanceController::class);
    // loan
    Route::get('loan/flow', [LoanController::class, 'flow'])->name('loan.flow');
    Route::resource('loan', LoanController::class);
    // Department
    Route::resource('department', DepartmentController::class);
    // Email
    Route::resource('email', EmailController::class);
    // SMS
    Route::resource('sms', SMSController::class);
    // Cash Flow
    Route::resource('cashFlow', CashFlowController::class);
    // Tax
    Route::resource('taxFlow', TaxFlowController::class);
    // Wallet
    Route::resource('wallet', WalletController::class);
});

Route::get('test', [EnquiryController::class, 'test']);
