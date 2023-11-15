<?php

namespace App\Http\Controllers;

use App\Models\SalaryInvoice;
use App\Models\Staff;
use App\Models\StaffAttendance;
use App\Models\StaffLoan;
use App\Models\StaffReceipt;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staff=Staff::find($id);
        return view('staff.show',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = Staff::find($id);
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token');
        Staff::find($id)->update($data);
        return redirect()->route('staff.index')->with('success', "Staff Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function attendance($id)
    {
        $staff = Staff::find($id);
        return view('staff.attendance.index', compact('staff'));
    }
    public function attendanceStore($id, Request $request)
    {
        $data = $request->except('_token');
        $data['staff_id'] = $id;
        StaffAttendance::create($data);
        return redirect()->back()->with('success', 'Staff Attendance Created Successfully.');
    }
    public function attendanceUpdate($id, Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        StaffAttendance::find($id)->update($data);

        return redirect()->back()->with('success', 'Staff Attendance Updated Successfully.');
    }
    public function pay($id)
    {
        $staff = Staff::find($id);
        return view('staff.pay.index', compact('staff'));
    }
    public function invoicePay($id)
    {
        $invoice = SalaryInvoice::find($id);
        $staff = $invoice->staff;
        return view('staff.pay.index', compact('staff', 'invoice'));
    }
    public function payStore(Request $request)
    {
        $data = $request->except('_token');
        StaffReceipt::create($data);
        StaffAttendance::where('date', '>=', $request->from_date)->where('date', '<=', $request->to_date)->where('staff_id', $request->staff_id)->update([
            'is_paid' => true
        ]);
        $staff = Staff::find($request->staff_id);
        if (count($staff->loan) > 0 && $staff->loan[0]->remaining() <= 0) {
            $loanId =  $staff->loan[0]->id;
            StaffLoan::find($loanId)->update([
                'is_paid' => true
            ]);
            // dd($staff->loan[0]->is_paid);
        }
        // dd($data);
        if (isset($request->invoice_id)) {
            SalaryInvoice::find($request->invoice_id)->update([
                'is_paid' => true
            ]);
            // dd($request->invoice_id);
        }
        return redirect()->back()->with('success', 'Pay Created Successfully.');
    }
    public function attendanceDelete($id)
    {
        StaffAttendance::find($id)->delete();
        return redirect()->back()->with('success', 'Attendance Deleted Successfully.');
    }
    public function getAttendance(Request $request)
    {
        $staff = Staff::find($request->staff);
        $attendance = StaffAttendance::where('staff_id', $request->staff)->where('date', '>=', $request->from)->where('date', '<=', $request->to)->where('is_paid', false)->get();
        if ($staff->salary_type == "Hourly") {
            $salary = 0;
            foreach ($attendance as $value) {
                $salary += $value->amount();
            }
        } else {
            if ($attendance->count() > 0) {

                $salary = $staff->salary;
            } else {
                $salary = 0;
            }
        }
        return response()->json([
            'data' => $attendance,
            'salary' => $salary,
            'paid_hour' => $attendance->sum('paid_hour')
        ]);
    }
    // Get Staff by Branch
    public function getStaff($id)
    {
        $staff = Staff::where('branch_id', $id)->get();
        $string = '<option value="">-</option>';
        foreach ($staff as $value) {
            $string .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        }
        return response()->json([
            'html' => $string
        ]);
    }
}