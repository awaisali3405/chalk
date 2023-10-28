<?php

namespace App\Http\Controllers;

use App\Models\TeacherEnquiry;
use Illuminate\Http\Request;

class TeacherEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enquiry = TeacherEnquiry::all();
        return view('teacherEnquiry.index', compact('enquiry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacherEnquiry.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if (isset($data['pic'])) {
            $data['pic'] = $this->saveImage($data['pic']);
        }
        TeacherEnquiry::create($data);
        return redirect()->route('enquiryTeacher.index')->with('success', 'Teacher Enquiry Created Successfully');
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
        $enquiry = TeacherEnquiry::find($id);
        return view('teacherEnquiry.edit', compact('enquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token');
        if (isset($data['pic'])) {
            $data['pic'] = $this->saveImage($data['pic']);
        }
        TeacherEnquiry::find($id)->update($data);
        return redirect()->route('enquiryTeacher.index')->with('success', 'Teacher Enquiry Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TeacherEnquiry::find($id)->delete();
        return redirect()->route('enquiryTeacher.index')->with('success', 'Teacher Enquiry Updated Successfully');
    }
}
