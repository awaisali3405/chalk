<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Student;
use App\Models\StudentInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentDebtController extends Controller
{
    public function debt($id)
    {
        $academicYear = auth()->user()->session();
        $student = Student::find($id);
        $student->update([
            'debt_collection' => true
        ]);
        $invoice = $student->invoice;
        $total = 0;
        foreach ($invoice as $key => $value) {
            if (!$value->is_paid) {
                $total += $value->remainingAmount();
                $value->receipt()->create([
                    'description' => 'Amount Transfer to ',
                    'amount' => $value->remainingAmount(),
                    'date' => Carbon::now(),
                    'mode' => 'Debt',
                    'academic_year_id' => auth()->user()->session()->id
                ]);
                $value->update([
                    'is_paid' => true
                ]);
            }
        }
        if ($total > 0) {
            $invoice = StudentInvoice::create([
                'student_id' => $student->id,
                'type' => 'Debt Collection',
                'amount' => $total,
                'from_date' => $academicYear->start_date,
                'to_date' => $academicYear->end_date,
                'branch_id' => $student->branch_id,
                'year_id' => $student->year_id,
                'academic_year_id' => $academicYear->id,
                'date' => Carbon::now(),
            ]);
            $invoice->update([
                'code' => "DC00" . $invoice->id . '/' . $academicYear->InvoiceYearCode(),
            ]);
        }
        return redirect()->back()->with('success', 'Student Added To Debt Collection Successfully.');
    }
    public function index(Request $request)
    {
        if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super admin') {

            if ($request->input()) {
                $student = new Student();
                if ($request->input('branch_id')) {
                    $student = $student->where('branch_id', $request->input('branch_id'));
                }
                if ($request->input('from_date')) {
                    $student = $student->where('admission_date', '>=', $request->input('from_date'));
                }
                if ($request->input('to_date')) {
                    $student = $student->where('admission_date', '<=', $request->input('to_date'));
                }
                if ($request->input('current_school')) {
                    $student = $student->where('current_school_name', $request->input('current_school'));
                }
                if ($request->input('from_week')) {
                    $student = $student->where('promotion_date', '>=', auth()->user()->dateWeek($request->input('from_week')));
                }
                if ($request->input('to_week')) {
                    $student = $student->where('promotion_date', '<=', auth()->user()->dateWeek($request->input('to_week')));
                }
                if ($request->input('know_about_us')) {
                    $student = $student->where('know_about_us', $request->input('know_about_us'));
                }
                if ($request->input('payment_period')) {
                    $student = $student->where('payment_period', $request->input('payment_period'));
                }
                $student = $student->where('active', true)->where('disable', false)->whereHas('promotionDetail', function ($query) {
                    $query->where('academic_year_id', auth()->user()->session()->id);
                })->get();
            } else {
                $student = Student::where('active', true)->where('disable', false)->whereHas('promotionDetail', function ($query) {
                    $query->where('academic_year_id', auth()->user()->session()->id);
                })->where('debt_collection', true)->get();
            }
        } else if (auth()->user()->role->name == 'parent') {
            $student = Parents::where('user_id', auth()->user()->id)->first();
            if ($student) {
                $student = $student->student->where('disable', false)->where('debt_collection', true);
                // dd($student);
            } else {
                $student = array();
            }
        }
        return view('student.debt.index', compact('student'));
    }
    public function activate($id)
    {
        $student = Student::find($id);
        if ($student->due() == 0) {
            $student->update([
                'debt_collection' => false
            ]);
            return redirect()->back()->with('success', 'Student Activate Successfully.');
        } else {
            return redirect()->back()->with('success', 'Student Cannot Activate, Because He/She have some debt to pay.');
        }
    }
}
