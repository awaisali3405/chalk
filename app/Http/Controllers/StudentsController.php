<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Branch;
use App\Models\Parents;
use App\Models\EnquirySubject;
use App\Models\EnquiryUpload;
use App\Models\InvoiceSubject;
use App\Models\KeyStage;
use App\Models\Paper;
use App\Models\ScienceType;
use App\Models\Student;
use App\Models\StudentInvoice;
use App\Models\Subject;
use App\Models\Year;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StudentsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super admin') {

            $student = Student::all();
        } else if (auth()->user()->role->name == 'parent') {
            $student = Parents::where('user_id', auth()->user()->id)->first();
            if ($student) {
                $student = $student->student;
            } else {
                $student = array();
            }
        }

        return view('student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enquirySubject = EnquirySubject::where('student_id', null)->where('enquiry_id', null)->delete();
        return view('student.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data1 = $request->except('_token');
        // dd($data);
        $data = $request->validate([
            'enquiry_id' => 'nullable',
            'profile_pic' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'phone_no' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'place_of_birth' => 'required',
            'main_language' => 'required',
            'other_language' => 'nullable',
            'dob' => 'required',
            'current_school_name' => 'required',
            'current_year' => 'required',
            'branch_id' => 'required',
            'payment_period' => 'required',
            'year_id' => 'required',
            'key_stage_id' => 'required',
            'lesson_type' => 'required',
            'admission_date' => 'nullable',
            'deposit' => 'nullable',
            'registration_fee' => 'nullable',
            'annual_resource_fee' => 'nullable',
            'resource_discount' => 'nullable',
            'exercise_book_fee' => 'nullable',
            'fee' => 'nullable',
            'fee_discount' => 'nullable',

            // 'ethic_group' => 'nullable',
            // 'religion' => 'nullable',
            'o_full_name_1' => 'nullable',
            'o_work_phone_1' => 'nullable',
            'o_relationship_1' => 'nullable',
            'o_mobile_phone_1' => 'nullable',
            'o_work_place_1' => 'nullable',
            'o_full_name_2' => 'nullable',
            'o_work_phone_2' => 'nullable',
            'o_relationship_2' => 'nullable',
            'o_mobile_phone_2' => 'nullable',
            'o_work_place_2' => 'nullable',
            'e_full_name_1' => 'nullable',
            'e_work_phone_1' => 'nullable',
            'e_relationship_1' => 'nullable',
            'e_mobile_phone_1' => 'nullable',
            'e_contact_info_1' => 'nullable',
            'e_full_name_2' => 'nullable',
            'e_work_phone_2' => 'nullable',
            'e_relationship_2' => 'nullable',
            'e_mobile_phone_2' => 'nullable',
            'e_contact_info_2' => 'nullable',
            'is_disable' => 'required',
            'disorder_detail' => 'nullable',
            'signature_person' => 'nullable',
            'know_about_us' => 'nullable',
            'feedback' => 'nullable',
            'parent_id' => 'required'
        ]);
        if (isset($request->profile_pic)) {
            $data['profile_pic'] =   $this->saveImage($request->profile_pic);
        } else {
            $data['profile_pic'] = 'images/avatar/1.png';
        }
        // dd($data1);
        $student = Student::create($data);
        if (auth()->user()->role == 'parent') {
            if ($data1['last_name1'][0]) {

                $parent = Parents::create([
                    'last_name' => $data1['last_name1'][0],
                    'first_name' => $data1['first_name1'][0],
                    'given_name' => $data1['given_name1'][0],
                    'gender' => $data1['gender1'][0],
                    'relationship' => $data1['relationship1'][0],
                    'emp_status' => $data1['emp_status1'][0],
                    'company_name' => $data1['company_name1'][0],
                    'work_phone_number' => $data1['work_phone_number1'][0],
                    'mobile_number' => $data1['mobile_number1'][0],
                    'email' => $data1['email1'][0],
                    'signature' => $data1['signature1'][0],
                    'signature_date' => $data1['signature_date1'][0],
                    'mail_address' => $data1['mail_address1'][0],
                    'res_address' => $data1['res_address1'][0],
                ]);
                $student->parents()->attach([$parent->id]);
            }
        } else {

            $student->parents()->attach($data1['parent_id']);
            if ($data1['last_name1'][0]) {

                $parent = Parents::create([
                    'last_name' => $data1['last_name1'][0],
                    'first_name' => $data1['first_name1'][0],
                    'given_name' => $data1['given_name1'][0],
                    'gender' => $data1['gender1'][0],
                    'relationship' => $data1['relationship1'][0],
                    'emp_status' => $data1['emp_status1'][0],
                    'company_name' => $data1['company_name1'][0],
                    'work_phone_number' => $data1['work_phone_number1'][0],
                    'mobile_number' => $data1['mobile_number1'][0],
                    'email' => $data1['email1'][0],
                    'signature' => $data1['signature1'][0],
                    'signature_date' => $data1['signature_date1'][0],
                    'mail_address' => $data1['mail_address1'][0],
                    'res_address' => $data1['res_address1'][0],
                ]);
                $student->parents()->attach([$parent->id]);
            }
        }
        $subject = $student->enquirySubject()->pluck('id')->toArray();
        // dd($subject);
        $invoice = StudentInvoice::create([
            'student_id' => $student->id,
            'amount' => $student->deposit,
            'type' => 'Refundable',
        ]);
        $invoice = StudentInvoice::create([
            'student_id' => $student->id,
            'amount' => $student->registration_fee,
            'type' => 'Registration',
        ]);
        $invoice = StudentInvoice::create([
            'student_id' => $student->id,
            'amount' => 0,
            'type' => 'Resource Fee',
        ]);
        foreach ($student->enquirySubject as $key => $value) {
            InvoiceSubject::create([
                'invoice_id' => $invoice->id,
                'subject_name' => $value->subject->name,
                'subject_rate' => $value->subject->rate
            ]);
        }
        $invoice->update([
            'amount' => $request->annual_resource_fee + $request->exercise_book_fee
        ]);



        $subject = EnquirySubject::whereIn('id', $data1['enquiry_subject'])->update([
            'student_id' => $student->id
        ]);

        return redirect()->route('student.index')->with('success', 'student Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'enquiry_id' => 'nullable',
            'profile_pic' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'phone_no' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'place_of_birth' => 'required',
            'main_language' => 'required',
            'other_language' => 'nullable',
            'dob' => 'required',
            'current_school_name' => 'required',
            'current_year' => 'required',
            'branch_id' => 'required',
            'payment_period' => 'required',
            'year_id' => 'required',
            'key_stage_id' => 'required',
            'lesson_type' => 'required',
            'admission_date' => 'nullable',
            'deposit' => 'nullable',
            'registration_fee' => 'nullable',
            'annual_resource_fee' => 'nullable',
            'resource_discount' => 'nullable',
            'exercise_book_fee' => 'nullable',
            'fee' => 'nullable',
            'fee_discount' => 'nullable',

            // 'ethic_group' => 'nullable',
            // 'religion' => 'nullable',
            'o_full_name_1' => 'nullable',
            'o_work_phone_1' => 'nullable',
            'o_relationship_1' => 'nullable',
            'o_mobile_phone_1' => 'nullable',
            'o_work_place_1' => 'nullable',
            'o_full_name_2' => 'nullable',
            'o_work_phone_2' => 'nullable',
            'o_relationship_2' => 'nullable',
            'o_mobile_phone_2' => 'nullable',
            'o_work_place_2' => 'nullable',
            'e_full_name_1' => 'nullable',
            'e_work_phone_1' => 'nullable',
            'e_relationship_1' => 'nullable',
            'e_mobile_phone_1' => 'nullable',
            'e_contact_info_1' => 'nullable',
            'e_full_name_2' => 'nullable',
            'e_work_phone_2' => 'nullable',
            'e_relationship_2' => 'nullable',
            'e_mobile_phone_2' => 'nullable',
            'e_contact_info_2' => 'nullable',
            'is_disable' => 'required',
            'disorder_detail' => 'nullable',
            'signature_person' => 'nullable',
            'know_about_us' => 'nullable',
            'feedback' => 'nullable',
            'parent_id' => 'required'
        ]);
        // $data = $request->except('_token', 'method');
        if (isset($request->profile_pic)) {
            $data['profile_pic'] =   $this->saveImage($request->profile_pic);
        }

        $student = Student::find($id);
        $student->update($data);

        // $student->parents()->detach();
        // foreach ($data['first_name1'] as $key => $value) {
        //     $parent = Parents::where('first_name', $data['first_name1'][$key])->first();
        //     // dd($parent->id, $student);
        //     if ($parent) {
        //         $parent->update([
        //             'relationship' => $data['relationship'][$key],
        //             'last_name' => $data['last_name1'][$key],
        //             'first_name' => $data['first_name1'][$key],
        //             'email' => $data['email1'][$key],
        //             'address' => $data['address'][$key],
        //             'post_code' => $data['post_code1'][$key],
        //             'occupation' => $data['occupation'][$key],
        //             'contact' => $data['contact'][$key],
        //         ]);
        //         $student->parents()->attach([$parent->id]);
        //     } else {
        //         $parent = Parents::create([
        //             'relationship' => $data['relationship'][$key],
        //             'last_name' => $data['last_name1'][$key],
        //             'first_name' => $data['first_name1'][$key],
        //             'email' => $data['email1'][$key],
        //             'address' => $data['address'][$key],
        //             'post_code' => $data['post_code1'][$key],
        //             'occupation' => $data['occupation'][$key],
        //             'contact' => $data['contact'][$key],
        //         ]);
        //         // dd($parent);
        //         $student->parents()->attach([$parent->id]);
        //     }
        // }

        // dd($data, $student->parent);
        return redirect()->route('student.index')->with('success', 'Branch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function note($id)
    {
        $student = Student::find($id);
        return view('student.note', compact('student'));
    }
    public function noteStore(Request $request, $id)
    {
        $data = $request->except('_token');
        // dd($data);
        Student::find($id)->update([
            'note' => $request->note
        ]);
        return redirect()->route('student.index')->with('success', 'Branch Updated Successfully');
    }
    public function upload($id)
    {

        $student = Student::find($id);
        return view('student.upload', compact('student'));
    }
    public function uploadStore(Request $request)
    {
        $data = $request->except('_token');
        $data['file'] = $this->saveImage($request->file);
        $data['file_name'] = $request->file->getClientOriginalName();
        // dd($data);
        EnquiryUpload::create($data);
        return redirect()->back()->with('success', 'Created Successfully');
    }
    public function uploadDelete($id)
    {
        $student = EnquiryUpload::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function getStudent($id)
    {
        $year = Year::find($id);
        $string = '<option value="">-</option>';
        // dd($year);
        foreach ($year->student as $key => $value) {
            $string .= "<option value='" . $value->id . "'>" . $value->first_name . "</option>";
        }
        return response()->json(['data' => $string]);
    }
    public function getStudentData($id)
    {
        // $year = Year::find($id);
        // dd($year);
        $student = Student::with('branch', 'year')->find($id);
        // dd($student->year->name);
        $html = '<option value="">-</option>';
        foreach ($student->enquirySubject as $key => $value) {
            $html .= "<option value='" . $value->id . "'>" . $value->subject->name . "</option>";
        }
        return response()->json(['data' => $student, 'html' => $html]);
    }
    public function statementPrint($id)
    {
        $student = Student::find($id);
        // $pdf = Pdf::loadView('student.print.statement', ['student' => $student]);
        // return $pdf->stream('statement.pdf');
        return view('student.print.statement', compact('student'));
    }
}
