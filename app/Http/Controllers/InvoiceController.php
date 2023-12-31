<?php

namespace App\Http\Controllers;

use App\Models\EnquirySubject;
use App\Models\InvoiceSubject;
use App\Models\Student;
use App\Models\StudentBook;
use App\Models\StudentInvoice;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->input()) {
            $student = Student::where(function ($query) use ($request) {
                if ($request->branch_id != 0) {
                    $query->where('branch_id', $request->branch_id);
                }
                if ($request->year_id) {
                    $query->where('year_id', $request->year_id);
                }
                if ($request->payment_period != 0) {
                    $query->where('payment_period', $request->payment_period);
                }
            })->whereHas('promotionDetail', function ($query) {
                $query->where('academic_year_id', auth()->user()->session()->id);
            })->where('disable', false)->get();
        } else {
            $student = Student::where('payment_period', "Weekly")->whereHas('promotionDetail', function ($query) {
                $query->where('academic_year_id', auth()->user()->session()->id);
            })->where('disable', false)->get();
        }
        return view('invoice.index', compact('student'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (request()->input()) {
            $student = new Student;
            if ($request->branch_id != 0) {
                $student = $student->where('branch_id', $request->branch_id);
            }
            if ($request->year_id) {

                $student = $student->whereIn('year_id', $request->year_id);
            }
            if ($request->payment_period != 0) {

                $student = $student->where('payment_period', $request->payment_period);
            }
            // dd('asdas');
            // if ($request->status) {
            $student = $student->where('is_promoted', false)->where('active', true)->whereHas('invoice', function ($student) {
                $student->where('is_paid', false)->where('academic_year_id', auth()->user()->session()->id);
            });
            // }
            $student = $student->where('disable', false)->where('debt_collection', false)->get();
            // dd($student);
        } else {
            $student = Student::where('payment_period', "Weekly")->where('is_promoted', false)->where('active', true)->whereHas('invoice', function ($query) {
                $query->where('is_paid', false)->where('academic_year_id', auth()->user()->session()->id);
            })->where('disable', false)->where('debt_collection', false)->get();
        }
        return view('invoice.add', compact('student'));
    }
    public function dueStudent(Request $request)
    {
        if (request()->input()) {
            $invoice = StudentInvoice::whereHas('student', function ($query) use ($request) {
                if ($request->branch_id != 0) {
                    $query->where('branch_id', $request->branch_id);
                }
                if ($request->year_id) {

                    $query->whereIn('year_id', $request->year_id);
                }
                if ($request->payment_period != 0) {

                    $query->where('payment_period', $request->payment_period);
                }
                if ($request->type != 0) {
                    // dd($request->type);
                    $query->where('type', str_replace(['+'], ' ', $request->type));
                }
            })->where('is_paid', false)->where('academic_year_id', auth()->user()->session()->id)->get();
            // dd($student);
        } else {
            $invoice = StudentInvoice::where('is_paid', false)->where('academic_year_id', auth()->user()->session()->id)->get();
        }

        return view('invoice.due', compact('invoice'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['type'] = 'Addition Invoice';
        $student = Student::find($request->student_id);

        if (isset($data['subject'])) {
            $amount = 0;
            foreach ($data['amount'] as $value) {
                $amount += $value;
            }
            // dd($data, $amount);


            $invoice = StudentInvoice::create([
                'student_id' => $student->id,
                'amount' => $amount,
                'tax' => $student->tax,
                'type' => $data['type'],
                'from_date' => $data['from_date'],
                'to_date' => $data['to_date'],
                'branch_id' => $student->branch_id,
                'year_id' => $student->currentYear()->id,
                'academic_year_id' => auth()->user()->session()->id,
                'date' => $request->date
            ]);
            $invoice->update([
                'code' => "F00" . $invoice->id . '/' . auth()->user()->session()->InvoiceYearCode()
            ]);
            foreach ($data['subject'] as $key => $value) {
                InvoiceSubject::create([
                    'invoice_id' => $invoice->id,
                    'subject_name' => Subject::find($value)->name,
                    'subject_rate' => $data['rate'][$key],
                    'subject_hr' => $data['hours'][$key],
                    'subject_amount' => $data['amount'][$key],
                    'academic_year_id' => auth()->user()->session()->id,

                ]);
            }
            Session::put('action', route("invoice.print", $invoice->id));
            return redirect()->route('invoice.index')->with('success', 'invoice Created Successfully.');
        } else {
            return redirect()->back()->with('error', 'Please Add Your Subject.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        $invoice = $student->invoice;
        return view('invoice.show', compact('invoice', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = StudentInvoice::find($id);

        return view('invoice.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', 'method');
        StudentInvoice::find($id)->update($data);
        return redirect()->route('invoice.index')->with('success', 'Invoice Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        StudentInvoice::find($id)->delete();
        return redirect()->back()->with('success', 'Invoice Deleted Successfully');
    }
    public function groupInvoice(Request $request)
    {
        if (!$request->from_date || !$request->to_date) {
            return redirect()->back()->with('error', 'Please fill from and to date');
        }
        $to = \Carbon\Carbon::parse($request->from_date);
        $from = \Carbon\Carbon::parse($request->to_date);
        $days = $to->diffInDays($from) + 1;
        $weeks = $to->diffInWeeks($from->addDay(1));
        $months = $to->diffInMonths($from->addDay(1));
        $to = Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
        $from = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');
        if ($request->student) {
            foreach ($request->student as $value) {
                $student = Student::find($value);
                if ($student->payment_period == "Weekly") {
                    $amount = (($student->yearSubject->where('active', true)->sum('amount') - $student->fee_discount) * $weeks);
                    // dd($amount, $weeks, $to, $from);
                    if ($amount > 0) {
                        $invoice = StudentInvoice::create([
                            'student_id' => $student->id,
                            'type' => 'Weekly Fee',
                            'tax' => $student->tax,
                            'amount' => $amount,
                            'from_date' => $to,
                            'to_date' => $from,
                            'branch_id' => $student->branch_id,
                            'year_id' => $student->currentYear()->id,
                            'academic_year_id' => auth()->user()->session()->id,
                            'discount' => $student->fee_discount,
                            'date' => $request->date

                        ]);
                        $invoice->update([
                            'code' => "F00" . $invoice->id . '/' . auth()->user()->session()->InvoiceYearCode()
                        ]);
                        $invoice->invoiceSubject()->sync($student->yearSubject()->pluck('id')->toArray());
                    }
                } else {
                    if (str_contains($student->year->name, "11")) {
                        $amount = ((($student->yearSubject->where('active', true)->sum('amount')) * 40 / 9) * $months) - $student->fee_discount;
                    } else {
                        $amount = ((($student->yearSubject->where('active', true)->sum('amount')) * 52 / 12) * $months) - $student->fee_discount;
                    }
                    // dd($amount, $months, ($student->yearSubject->sum('amount')));
                    if ($amount > 0) {
                        $invoice = StudentInvoice::create([
                            'student_id' => $student->id,
                            'type' => 'Monthly Fee',
                            'amount' => $amount,
                            'tax' => $student->tax,
                            'from_date' => $to,
                            'to_date' => $from,
                            'branch_id' => $student->branch_id,
                            'year_id' => $student->currentYear()->id,
                            'academic_year_id' => auth()->user()->session()->id,
                            'discount' => $student->fee_discount,
                            'date' => $request->date
                        ]);
                        $invoice->update([
                            'code' => "F00" . $invoice->id . '/' . auth()->user()->session()->InvoiceYearCode()
                        ]);
                        $invoice->invoiceSubject()->sync($student->yearSubject()->where('active', true)->pluck('id')->toArray());
                    }
                }
            }
            return redirect()->back()->with('success', "General Invoice Created Successfully");
        } else {
            return redirect()->back()->with('error', "Please Select Student");
        }
    }
    public function print($id)
    {
        $invoice = StudentInvoice::find($id);
        Session::forget('action');
        return view('invoice.print.pdf', compact('invoice'));
    }
    public function bookStore(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        $data['type'] = 'Addition Book Invoice';
        $student = Student::find($request->student_id);

        if (isset($data['subject'])) {
            $amount = 0;
            foreach ($data['amount'] as $value) {
                $amount += $value;
            }
            $invoice = StudentInvoice::create([
                'student_id' => $student->id,
                'amount' => $amount,
                'tax' => 0,
                'type' => $data['type'],
                'from_date' => $data['from_date'],
                'to_date' => $data['to_date'],
                'branch_id' => $student->branch_id,
                'year_id' => $student->currentYear()->id,
                'academic_year_id' => auth()->user()->session()->id,
                'date' => $data['date'],
            ]);
            $invoice->update([
                'code' => "AR00" . $invoice->id . '/' . auth()->user()->session()->InvoiceYearCode()
            ]);

            foreach ($data['subject'] as $key => $value) {
                StudentBook::create([
                    'invoice_id' => $invoice->id,
                    'subject_id' => $value,
                    'subject_name' => Subject::find($value)->name,
                    'book_name' => $data['book_name'][$key],
                    'rate' => $data['rate'][$key],
                    'quantity' => $data['quantity'][$key],
                    'amount' => $data['amount'][$key],
                    'branch_id' => $invoice->branch_id,
                    'academic_year_id' => auth()->user()->session()->id
                ]);
            }
            Session::put('action', route("invoice.print", $invoice->id));
            return redirect()->route('invoice.index')->with('success', 'invoice Created Successfully.');
        } else {
            return redirect()->back()->with('error', 'Please Add Your Subject.');
        }
    }
}
