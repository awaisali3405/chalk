<?php

namespace App\Http\Controllers;

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
            $invoice = StudentInvoice::all();

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
    public function create()
    {
        return view('invoice.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['type'] = 'Refundable';
        $student = Student::find($request->student_id);
        if ($student->payment_period == 'Weekly') {

            $data['amount'] = (($student->fee - $student->fee_discount) / 7) * 30;
        } else {
            $data['amount'] = ($student->fee - $student->fee_discount);
        }
        StudentInvoice::create($data);
        return redirect()->route('invoice.index')->with('success', 'invoice Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = StudentInvoice::where('student_id', $id)->get();
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
        // $days=$request->from_date
        // dd($request, $days, $weeks);

        if ($request->student) {


            foreach ($request->student as $value) {
                $student = Student::find($value);
                if ($student->payment_period == "Weekly") {
                    $amount = ($student->fee - $student->fee_discount) * $weeks;
                    StudentInvoice::create([
                        'student_id' => $student->id,
                        'type' => $weeks . ' Weeks Fee',
                        'amount' => $amount,
                        'from_date' => $to,
                        'to_date' => $from,
                    ]);
                } else {
                    $amount = ($student->fee - $student->fee_discount);
                    StudentInvoice::create([
                        'student_id' => $student->id,
                        'type' => 'Monthly Fee',
                        'amount' => $amount,
                        'from_date' => $to,
                        'to_date' => $from,
                    ]);
                }
            }
            return redirect()->route('invoice.index')->with('success', "General Invoice Created Successfully");
        } else {
            return redirect()->route('invoice.index')->with('error', "Select Student");
        }
    }
    public function print($id)
    {
        $invoice = StudentInvoice::find($id);
        return view('invoice.print.pdf', compact('invoice'));
    }
}
