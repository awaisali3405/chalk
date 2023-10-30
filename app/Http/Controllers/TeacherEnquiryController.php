<?php

namespace App\Http\Controllers;

use App\Models\TeacherEnquiry;
use App\Models\TeacherSubject;
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
        if (isset($data['cv_check'])) {
            $data['cv_check'] = $data['cv_check'] == "on" ? 1 : 0;
        }
        if (isset($data['dbs_check'])) {
            $data['dbs_check'] = $data['dbs_check'] == "on" ? 1 : 0;
        }
        if (isset($data['passport(_check'])) {
            $data['passport(_check'] = $data['passport(_check'] == "on" ? 1 : 0;
        }
        if (isset($data['visa_check'])) {
            $data['visa_check'] = $data['visa_check'] == "on" ? 1 : 0;
        }
        if (isset($data['n1_check'])) {
            $data['n1_check'] = $data['n1_check'] == "on" ? 1 : 0;
        }
        if (isset($data['document_check'])) {
            $data['document_check'] = $data['document_check'] == "on" ? 1 : 0;
        }
        if (isset($data['refrence_check'])) {

            $data['refrence_check'] = $data['refrence_check'] == "on" ? 1 : 0;
        }
        if (isset($data['address_check'])) {

            $data['address_check'] = $data['address_check'] == "on" ? 1 : 0;
        }
        if (isset($data['hs_check'])) {

            $data['hs_check'] = $data['hs_check'] == "on" ? 1 : 0;
        }
        if (isset($data['application_check'])) {

            $data['application_check'] = $data['application_check'] == "on" ? 1 : 0;
        }
        if (isset($data['work_check'])) {

            $data['work_check'] = $data['work_check'] == "on" ? 1 : 0;
        }
        if (isset($data['rule_responsibility_check'])) {

            $data['rule_responsibility_check'] = $data['rule_responsibility_check'] == "on" ? 1 : 0;
        }

        if (isset($data['cv_document'])) {

            $data['cv_document'] = $this->saveImage($data['cv_document']);
        }
        if (isset($data['dbs_document'])) {

            $data['dbs_document'] = $this->saveImage($data['dbs_document']);
        }
        if (isset($data['passport(_document'])) {

            $data['passport(_document'] = $this->saveImage($data['passport(_document']);
        }
        if (isset($data['visa_document'])) {

            $data['visa_document'] = $this->saveImage($data['visa_document']);
        }
        if (isset($data['n1_document'])) {

            $data['n1_document'] = $this->saveImage($data['n1_document']);
        }
        if (isset($data['document_document'])) {

            $data['document_document'] = $this->saveImage($data['document_document']);
        }
        if (isset($data['refrence_document'])) {

            $data['refrence_document'] = $this->saveImage($data['refrence_document']);
        }
        if (isset($data['address_document'])) {

            $data['address_document'] = $this->saveImage($data['address_document']);
        }
        if (isset($data['hs_document'])) {

            $data['hs_document'] = $this->saveImage($data['hs_document']);
        }
        if (isset($data['application_document'])) {

            $data['application_document'] = $this->saveImage($data['application_document']);
        }
        if (isset($data['work_document'])) {

            $data['work_document'] = $this->saveImage($data['work_document']);
        }
        if (isset($data['rule_responsibility_document'])) {

            $data['rule_responsibility_document'] = $this->saveImage($data['rule_responsibility_document']);
        }
        if (isset($data['pic'])) {
            $data['pic'] = $this->saveImage($data['pic']);
        }

        $teacherEnquiry = TeacherEnquiry::create($data);
        foreach ($data['subject'] as $value) {
            TeacherSubject::create([
                'teacher_enquiry_id' => $teacherEnquiry->id,
                'subject_id' => $value
            ]);
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
        if (isset($data['cv_check'])) {
            $data['cv_check'] = $data['cv_check'] == "on" ? 1 : 0;
        }
        if (isset($data['dbs_check'])) {
            $data['dbs_check'] = $data['dbs_check'] == "on" ? 1 : 0;
        }
        if (isset($data['passport(_check'])) {
            $data['passport(_check'] = $data['passport(_check'] == "on" ? 1 : 0;
        }
        if (isset($data['visa_check'])) {
            $data['visa_check'] = $data['visa_check'] == "on" ? 1 : 0;
        }
        if (isset($data['n1_check'])) {
            $data['n1_check'] = $data['n1_check'] == "on" ? 1 : 0;
        }
        if (isset($data['document_check'])) {
            $data['document_check'] = $data['document_check'] == "on" ? 1 : 0;
        }
        if (isset($data['refrence_check'])) {

            $data['refrence_check'] = $data['refrence_check'] == "on" ? 1 : 0;
        }
        if (isset($data['address_check'])) {

            $data['address_check'] = $data['address_check'] == "on" ? 1 : 0;
        }
        if (isset($data['hs_check'])) {

            $data['hs_check'] = $data['hs_check'] == "on" ? 1 : 0;
        }
        if (isset($data['application_check'])) {

            $data['application_check'] = $data['application_check'] == "on" ? 1 : 0;
        }
        if (isset($data['work_check'])) {

            $data['work_check'] = $data['work_check'] == "on" ? 1 : 0;
        }
        if (isset($data['rule_responsibility_check'])) {

            $data['rule_responsibility_check'] = $data['rule_responsibility_check'] == "on" ? 1 : 0;
        }

        if (isset($data['cv_document'])) {

            $data['cv_document'] = $this->saveImage($data['cv_document']);
        }
        if (isset($data['dbs_document'])) {

            $data['dbs_document'] = $this->saveImage($data['dbs_document']);
        }
        if (isset($data['passport(_document'])) {

            $data['passport(_document'] = $this->saveImage($data['passport(_document']);
        }
        if (isset($data['visa_document'])) {

            $data['visa_document'] = $this->saveImage($data['visa_document']);
        }
        if (isset($data['n1_document'])) {

            $data['n1_document'] = $this->saveImage($data['n1_document']);
        }
        if (isset($data['document_document'])) {

            $data['document_document'] = $this->saveImage($data['document_document']);
        }
        if (isset($data['refrence_document'])) {

            $data['refrence_document'] = $this->saveImage($data['refrence_document']);
        }
        if (isset($data['address_document'])) {

            $data['address_document'] = $this->saveImage($data['address_document']);
        }
        if (isset($data['hs_document'])) {

            $data['hs_document'] = $this->saveImage($data['hs_document']);
        }
        if (isset($data['application_document'])) {

            $data['application_document'] = $this->saveImage($data['application_document']);
        }
        if (isset($data['work_document'])) {

            $data['work_document'] = $this->saveImage($data['work_document']);
        }
        if (isset($data['rule_responsibility_document'])) {

            $data['rule_responsibility_document'] = $this->saveImage($data['rule_responsibility_document']);
        }
        if (isset($data['pic'])) {
            $data['pic'] = $this->saveImage($data['pic']);
        }

        $teacherEnquiry = TeacherEnquiry::find($id);
        $teacherEnquiry->update($data);
        $teacherEnquiry->subject()->delete();
        foreach ($data['subject'] as $value) {
            TeacherSubject::create([
                'teacher_enquiry_id' => $teacherEnquiry->id,
                'subject_id' => $value
            ]);
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
}
