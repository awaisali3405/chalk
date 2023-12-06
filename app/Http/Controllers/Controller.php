<?php

namespace App\Http\Controllers;

use App\Models\AcademicCalender;
use App\Models\Board;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Enquiry;
use App\Models\ExpenseAccountType;
use App\Models\KeyStage;
use App\Models\LessonType;
use App\Models\Paper;
use App\Models\Parents;
use App\Models\ScienceType;
use App\Models\Student;
use App\Models\StudentInvoice;
use App\Models\Subject;
use App\Models\Supplier;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function saveImage($image)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/images'), $filename);
        return 'images/' . $filename;
    }
    public function __construct()
    {
        $branch = Branch::all();
        View::share('branch', $branch);
        $year = Year::all();
        View::share('year', $year);
        $keyStage = KeyStage::all();
        View::share('keyStage', $keyStage);
        $subject = Subject::all();
        View::share('subject', $subject);
        $board = Board::all();
        View::share('board', $board);
        $scienceType = ScienceType::all();
        View::share('scienceType', $scienceType);
        $paper = Paper::all();
        View::share('paper', $paper);
        $supplier = Supplier::all();
        View::share('supplier', $supplier);
        $parent = Parents::all();
        View::share('parent', $parent);
        $lessonType = LessonType::all();
        View::share('lessonType', $lessonType);
        $expenseTypeAccount = ExpenseAccountType::all();
        View::share('expenseTypeAccount', $expenseTypeAccount);
        $currentShool = Enquiry::distinct('current_school_name')->pluck('current_school_name');
        View::share('currentShool', $currentShool);
        $department = Department::all();
        View::share('department', $department);
        $academicCalender = AcademicCalender::all();
        View::share('academicCalender', $academicCalender);
        $knowUsAbout = Student::distinct('know_about_us')->pluck("know_about_us");
        View::share('knowUsAbout', $knowUsAbout);
        $academicCalender = AcademicCalender::where('active', 1)->first();
        $invoiceType = StudentInvoice::where('academic_year_id', $academicCalender->id)->distinct('type')->pluck('type');
        View::share('invoiceType', $invoiceType);

        // $studentRequest=
    }
    public function ukFormat($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
