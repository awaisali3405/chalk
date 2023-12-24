<?php

namespace App\Http\Controllers;

use App\Models\StaffRequest;
use Illuminate\Http\Request;

class StaffRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffRequest = StaffRequest::all();
        return view('staff.request.index', compact('staffRequest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.request.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['academic_year_id'] = auth()->user()->session()->id;
        StaffRequest::create($data);
        return redirect()->route('staffRequest.index')->with('success', 'Staff Request Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staffRequest = StaffRequest::find($id);
        return view('staff.request.show', compact('staffRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $staffRequest = StaffRequest::find($id);
        return view('staff.request.edit', compact('staffRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token');
        StaffRequest::find($id)->update($data);
        return redirect()->route('staffRequest.index')->with('success', 'Staff Request Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        StaffRequest::find($id);
        return redirect()->back()->with('success', 'Staff Request Deleted Successfully');
    }
}
