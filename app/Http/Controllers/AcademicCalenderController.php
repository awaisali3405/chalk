<?php

namespace App\Http\Controllers;

use App\Models\AcademicCalender;
use Illuminate\Http\Request;

class AcademicCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicCalender = AcademicCalender::all();
        return view('academicCalender.index', compact('academicCalender'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academicCalender.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        AcademicCalender::create($data);
        return redirect()->route('academicCalender.index')->with('success', 'academicCalender Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $calender = AcademicCalender::find($id);
        $calender->update([
            'active' => !$calender->active
        ]);

        if ($calender->active) {

            return redirect()->route('academicCalender.index')->with('success', 'Calender Active Successfully');
        } else {
            return redirect()->route('academicCalender.index')->with('success', 'Calender De Activated Successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $academicCalender = AcademicCalender::find($id);
        return view('academicCalender.edit', compact('academicCalender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', 'method');
        AcademicCalender::find($id)->update($data);
        return redirect()->route('academicCalender.index')->with('success', 'Branch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
