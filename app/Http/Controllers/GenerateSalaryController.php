<?php

namespace App\Http\Controllers;

use App\Models\SalaryInvoice;
use App\Models\Staff;
use App\Models\StaffInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GenerateSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        if (request()->input()) {
            $staff = new Staff();
            if ($request->branch_id) {

                $staff = $staff->where("branch_id", request()->input('branch_id'));
            }
            if ($request->department_id) {

                $staff = $staff->where("department_id", request()->input('department_id'));
            }
            $staff = $staff->where('salary_type', "Monthly")->get();
        } else {

            $staff = Staff::where('salary_type', "Monthly")->get();
        }
        return view('salaryGenerate.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (request()->input()) {
            $staff = new Staff();
            if ($request->branch_id) {

                $staff = $staff->where("branch_id", request()->input('branch_id'));
            }
            if ($request->department_id) {

                $staff = $staff->where("department_id", request()->input('department_id'));
            }
            $staff = $staff->where('salary_type', "Monthly")->pluck('id');
        } else {

            $staff = Staff::where('salary_type', "Monthly")->pluck('id');
        }
        // dd($staff);
        $invoice = SalaryInvoice::whereIn('staff_id', $staff)->get();
        return view('salaryGenerate.show', compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['from_date'] = Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
        $data['to_date'] = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');
        // dd($data);
        if (isset($request->staff)) {
            foreach ($request->staff as $value) {
                $data['staff_id'] = $value;
                $staff = Staff::find($value);
                $data['amount'] = $staff->salary;
                SalaryInvoice::create($data);
            }

            return redirect()->back()->with('success', 'Staff Salary Generate Successfully.');
        } else {
            return redirect()->back()->with('error', 'Staff not Selected.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
