<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffAttendance;
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
        //
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
        StaffAttendance::find($id)->update($data);
        return redirect()->back()->with('success', 'Staff Attendance Updated Successfully.');
    }
    public function pay($id)
    {
        $staff = Staff::find($id);
        return view('staff.pay.index', compact('staff'));
    }
}
