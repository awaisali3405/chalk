<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();
        return view('staffAttendance.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (request()->input()) {
            $staff = new Staff;
            if (request()->input('branch_id')) {
                $staff = $staff->where('branch_id', request()->input('branch_id'));
            }
            if (request()->input('department_id')) {
                $staff = $staff->where('department_id', request()->input('department_id'));
            }
            if (request()->input('salary_type')) {
                $staff = $staff->where('salary_type', request()->input('salary_type'));
            }
            $staff = $staff->get();
        } else {
            $staff = Staff::where('salary_type', "Monthly")->get();
        }
        return view('staffAttendance.add', compact('staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);

        if (isset($data['teacher'])) {

            foreach ($data['teacher'] as $value) {
                $staff = Staff::find($value);
                if (isset($data['paid_hour'])) {
                    $data['rate'] = $staff->salary;
                }
                $staff->attendance()->create($data);
            }
        } else {

            return redirect()->back()->with('error', 'Please Select Teacher.');
        }
        // Staff::create($data);
        return redirect()->route('staffAttendance.index')->with('success', 'Staff Attendance Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = Staff::find($id);
        return view('staffAttendance.edit', compact('staffAttendance'));
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
