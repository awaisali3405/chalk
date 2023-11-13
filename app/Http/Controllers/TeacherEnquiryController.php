<?php

namespace App\Http\Controllers;

use App\Models\EnquiryUpload;
use App\Models\Staff;
use App\Models\TeacherEnquiry;
use App\Models\TeacherEnquiryInterview;
use App\Models\TeacherPayroll;
use App\Models\TeacherSubject;
use App\Models\TeacherUpload;
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

        $teacherEnquiry = TeacherEnquiry::create($data);
        if (isset($data['subject'])) {
            foreach ($data['subject'] as $value) {
                TeacherSubject::create([
                    'teacher_enquiry_id' => $teacherEnquiry->id,
                    'subject_id' => $value
                ]);
            }
        }
        // dd($data);
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


        $teacherEnquiry = TeacherEnquiry::find($id);
        $teacherEnquiry->update($data);
        $teacherEnquiry->subject()->delete();
        if (isset($data['subject'])) {
            foreach ($data['subject'] as $value) {
                TeacherSubject::create([
                    'teacher_enquiry_id' => $teacherEnquiry->id,
                    'subject_id' => $value
                ]);
            }
        }
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
    public function upload($id)
    {
        $teacherEnquiry = TeacherEnquiry::find($id);
        return view('teacherEnquiry.upload', compact('teacherEnquiry'));
    }
    public function uploadStore(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['teacher_enquiry_id'] = $id;

        $data['file_name'] = $this->saveImage($data['file']);
        // dd($data);
        $teacherEnquiry = TeacherUpload::create($data);
        return redirect()->route('enquiryTeacher.upload', $id)->with('success', 'Upload Created Successfully');
    }
    public function register($id)
    {
        $teacherEnquiry = TeacherEnquiry::find($id);
        return view('teacherEnquiry.register', compact('teacherEnquiry'));
    }
    public function registerPost(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['teacher_enquiry_id'] = $id;
        Staff::create($data);
        return redirect()->back()->with('success', 'Staff Created Successfully');
    }
    public function sendInterview(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['teacher_enquiry_id'] = $id;
        TeacherEnquiryInterview::create($data);
        return  redirect()->back()->with('success', 'Interview Request Successfully');
    }
    public function note($id)
    {
        $enquiry = TeacherEnquiry::find($id);
        return view('teacherEnquiry.note', compact('enquiry'));
    }
    public function notePost(Request $request, $id)
    {
        $data = $request->except('_token');
        TeacherEnquiry::find($id)->update([
            'note' => $data['note']
        ]);
        return redirect()->route('enquiryTeacher.index')->with('success', 'Note Submit successfully.');
    }
    public function payroll($id)
    {
        $enquiry = TeacherEnquiry::find($id);
        return view('teacherEnquiry.payroll', compact('enquiry'));
    }
    public function payrollStore($id, Request $request)
    {
        $data = $request->except('_token');
        $data['teacher_enquiry_id'] = $id;
        TeacherPayroll::create($data);
        return redirect()->back()->with('success', 'Payroll Upload Created Successfully.');
    }
    public function payrollDelete($id)
    {
        TeacherPayroll::find($id)->delete();
        return redirect()->route('enquiryTeacher.index')->with('success', 'Payroll Upload Deleted Successfully.');
    }
}
