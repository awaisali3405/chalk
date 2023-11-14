<?php

namespace App\Http\Controllers;

use App\Models\EnquirySubject;
use App\Models\InvoiceSubject;
use App\Models\Student;
use App\Models\StudentInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (request()->input()) {
            $invoice = StudentInvoice::latest();

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
            })->get();
            // dd($student);
        } else {
            $invoice = StudentInvoice::all();
            $student = Student::where('payment_period', "Weekly")->get();
        }

        return view('invoice.index', compact('invoice', 'student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (request()->input()) {
            $invoice = StudentInvoice::latest();

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
                if ($request->status) {
                    $query->whereHas('invoice', function ($query) {
                        $query->where('is_paid', true);
                    });
                }
            })->get();
            // dd($student);
        } else {
            $invoice = StudentInvoice::all();
            $student = Student::where('payment_period', "Weekly")->get();
        }

        return view('invoice.add', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['type'] = 'Addition Invoice';
        $student = Student::find($request->student_id);

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
            'to_date' => $data['to_date']
        ]);
        foreach ($data['subject'] as $key => $value) {
            InvoiceSubject::create([
                'invoice_id' => $invoice->id,
                'subject_name' => EnquirySubject::find($value)->subject->name,
                'subject_rate' => $data['rate'][$key],
                'subject_hr' => $data['hours'][$key],
                'subject_amount' => $data['amount'][$key],
            ]);
        }

        return redirect()->route('invoice.index')->with('success', 'invoice Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = StudentInvoice::where('student_id', $id)->latest()->get();
        $student = Student::find($id);
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
        return redirect()->route('invoice.index')->with('success', 'Branch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function groupInvoice(Request $request)
    {
        $to = \Carbon\Carbon::parse($request->from_date);
        $from = \Carbon\Carbon::parse($request->to_date);


        $days = $to->diffInDays($from) + 1;
        $weeks = $to->diffInWeeks($from->addDay(2));
        $months = $to->diffInMonths($from->addDay(1));
        // $days=$request->from_date
        $to = Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
        $from = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');
        // dd($request, $days, $weeks, $to, $from, date('m/d/y', strtotime($to)));

        if ($request->student) {


            foreach ($request->student as $value) {
                $student = Student::find($value);
                if ($student->payment_period == "Weekly") {
                    $amount = (($student->enquirySubject->sum('amount') - $student->fee_discount) * $weeks);
                    if ($amount > 0) {
                        $invoice = StudentInvoice::create([
                            'student_id' => $student->id,
                            'type' => 'Weekly Fee',
                            'tax' => $student->tax,
                            'amount' => $amount,
                            'from_date' => $to,
                            'to_date' => $from,
                        ]);
                    }
                } else {
                    if (str_contains($student->year->name, "11")) {
                        $amount = (($student->enquirySubject->sum('amount') - $student->fee_discount) * 40 / 9) * $months;
                    } else {

                        $amount = (($student->enquirySubject->sum('amount') - $student->fee_discount) * 52 / 12) * $months;
                    }
                    if ($amount > 0) {

                        StudentInvoice::create([
                            'student_id' => $student->id,
                            'type' => 'Monthly Fee',
                            'amount' => $amount,
                            'tax' => $student->tax,
                            'from_date' => $to,
                            'to_date' => $from,
                        ]);
                    }
                }
            }
            return redirect()->back()->with('success', "General Invoice Created Successfully");
        } else {
            return redirect()->back()->with('error', "Select Student");
        }
    }
    public function print($id)
    {
        $invoice = StudentInvoice::find($id);
        return view('invoice.print.pdf', compact('invoice'));
    }
}
