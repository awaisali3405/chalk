<?php

namespace App\Http\Controllers;

use App\Models\HMRC;
use App\Models\SalaryInvoice;
use App\Models\Staff;
use App\Models\StaffAttendance;
use App\Models\StaffLoan;
use App\Models\StaffReceipt;
use Carbon\Carbon;
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
        $staff = Staff::find($id);
        return view('staff.show', compact('staff'));
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
        $data['academic_year_id'] = auth()->user()->session()->id;
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
        $staff = Staff::find($data['staff_id']);

        if ($data['total'] <= 0) {
            return redirect()->back()->with('error', 'Amount Must be greater than zero.');
        }
        if ($staff->salary_type == 'Monthly') {

            $data['from_date'] =   Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
            $data['to_date'] = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');
        }
        $data['academic_year_id'] = auth()->user()->session()->id;
        $staff = Staff::find($data['staff_id']);
        $data['branch_id'] = $staff->branch_id;
        StaffReceipt::create($data);
        StaffAttendance::where('date', '>=',  $data['from_date'])->where('date', '<=',    $data['to_date'])->where('staff_id', $request->staff_id)->update([
            'is_paid' => true
        ]);
        $staff = Staff::find($request->staff_id);
        $staff->update([
            'dbs_deduct' => $request->dbs + $staff->dbs_deduct
        ]);
        $staff->request()->update([
            'fixed' => true
        ]);
        if (count($staff->loan) > 0 && $staff->loan[0]->remaining() <= 0) {
            $loanId =  $staff->loan[0]->id;
            StaffLoan::find($loanId)->update([
                'is_paid' => true
            ]);
        }
        if (isset($request->invoice_id)) {
            SalaryInvoice::find($request->invoice_id)->update([
                'is_paid' => true
            ]);
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
            $salary = $staff->salary;

            // if ($attendance->count() > 0) {
            // } else {
            //     $salary = 0;
            // }
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
    public function hmrc(Request $request)
    {
        $from_date = auth()->user()->session()->start_date;
        $to_date = auth()->user()->session()->end_date;
        if (request()->input()) {
            if ($request->from_date) {
                $from_date = $request->from_date;
            }
            if ($request->to_date) {
                $to_date = $request->to_date;
            }
        }
        $staff = Staff::whereHas('receipt', function ($query) use ($from_date, $to_date) {
            $query->where('date', '>=', $from_date)->where('date', '<=', $to_date);
        });
        if (request()->input('branch_id')) {
            $staff = $staff->where('branch_id', request()->input('branch_id'))->get();
        } else {
            $staff = $staff->get();
        }
        return view('hmrc.index', compact('staff', 'from_date', 'to_date'));
    }
    public function hmrcStore(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'payment_type' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'date' => 'required',
            'amount' => 'required',
            'discount' => 'required'
        ]);
        $data['academic_year_id'] = auth()->user()->session()->id;
        HMRC::create($data);
        return redirect()->back()->with('success', "HMRC has been added successfully");
    }
    public function hmrcList(Request $request)
    {
        $hmrc = HMRC::latest()->get();
        return view('hmrc.list', compact('hmrc'));
    }
    public function statement($id)
    {
        $staff = Staff::find($id);
        return view('staff.statement', compact('staff'));
    }
}
