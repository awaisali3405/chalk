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
        // $data = $request->validate([
        //     'enquiry_id' => 'nullable',
        //     'profile_pic' => 'required',
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'middle_name' => 'nullable',
        //     'phone_no' => 'required',
        //     'gender' => 'required',
        //     'nationality' => 'required',
        //     'main_language' => 'required',
        //     'other_language' => 'nullable',
        //     'dob' => 'required',
        //     'current_school_name' => 'required',
        //     'current_year' => 'required',
        //     'branch_id' => 'nullable',
        //     'payment_period' => 'nullable',
        //     'year_id' => 'required',
        //     'key_stage_id' => 'required',
        //     'lesson_type' => 'required',
        //     'admission_date' => 'nullable',
        //     'deposit' => 'nullable',
        //     'registration_fee' => 'nullable',
        //     'annual_resource_fee' => 'nullable',
        //     'resource_discount' => 'nullable',
        //     'exercise_book_fee' => 'nullable',
        //     'fee' => 'nullable',
        //     'fee_discount' => 'nullable',

        //     'ethic_group' => 'nullable',
        //     'religion' => 'nullable',
        //     'o_full_name_1' => 'nullable',
        //     'o_work_phone_1' => 'nullable',
        //     'o_relationship_1' => 'nullable',
        //     'o_mobile_phone_1' => 'nullable',
        //     'o_work_place_1' => 'nullable',
        //     'o_full_name_2' => 'nullable',
        //     'o_work_phone_2' => 'nullable',
        //     'o_relationship_2' => 'nullable',
        //     'o_mobile_phone_2' => 'nullable',
        //     'o_work_place_2' => 'nullable',
        //     'e_full_name_1' => 'nullable',
        //     'e_work_phone_1' => 'nullable',
        //     'e_relationship_1' => 'nullable',
        //     'e_mobile_phone_1' => 'nullable',
        //     'e_contact_info_1' => 'nullable',
        //     'e_full_name_2' => 'nullable',
        //     'e_work_phone_2' => 'nullable',
        //     'e_relationship_2' => 'nullable',
        //     'e_mobile_phone_2' => 'nullable',
        //     'e_contact_info_2' => 'nullable',
        //     'is_disable' => 'required',
        //     'disorder_detail' => 'nullable',
        //     'signature_person' => 'required',
        //     'know_about_us' => 'nullable',
        //     'feedback' => 'nullable',
        // ]);

        if (isset($request->profile_pic)) {
            $data['profile_pic'] =   $this->saveImage($request->profile_pic);
        } else {
            $data['profile_pic'] = 'images/avatar/1.png';
        }
        $student = Student::create($data);

        if (auth()->user()->role == 'parent') {
            $parent = Parents::create([
                'last_name' => $data['last_name1'][1],
                'first_name' => $data['first_name1'][1],
                'given_name' => $data['given_name1'][1],
                'gender' => $data['gender1'][1],
                'relationship' => $data['relationship1'][1],
                'emp_status' => $data['emp_status1'][1],
                'company_name' => $data['company_name1'][1],
                'work_phone_number' => $data['work_phone_number1'][1],
                'mobile_number' => $data['mobile_number1'][1],
                'email' => $data['email1'][1],
                'signature' => $data['signature1'][1],
                'signature_date' => $data['signature_date1'][1],
                'mail_address' => $data['mail_address1'][1],
                'res_address' => $data['res_address1'][1],
            ]);
            $student->parents()->attach([$parent->id]);
        } else {

            $student->parents()->detach();
            foreach ($data['first_name1'] as $key => $value) {
                $parent = Parents::where('first_name', $data['first_name1'][$key])->first();
                // dd($parent->id, $student);
                if ($parent) {
                    $parent->update([
                        'relationship' => $data['relationship'][$key],
                        'last_name' => $data['last_name1'][$key],
                        'first_name' => $data['first_name1'][$key],
                        'email' => $data['email1'][$key],
                        'address' => $data['address'][$key],
                        'post_code' => $data['post_code1'][$key],
                        'occupation' => $data['occupation'][$key],
                        'contact' => $data['contact'][$key],
                    ]);
                    $student->parents()->attach([$parent->id]);
                } else {

                    // dd($parent);
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
                'type' => 'Non Refundable',
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
                'amount' => $invoice->subject->sum('student_rate')
            ]);



            $subject = EnquirySubject::whereIn('id', $data['enquiry_subject'])->update([
                'student_id' => $student->id
            ]);
        }
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
        $data = $request->except('_token', 'method');
        if (isset($request->profile_pic)) {
            $data['profile_pic'] =   $this->saveImage($request->profile_pic);
        }

        $student = Student::find($id);
        $student->update($data);
        $student->parents()->detach();
        foreach ($data['first_name1'] as $key => $value) {
            $parent = Parents::where('first_name', $data['first_name1'][$key])->first();
            // dd($parent->id, $student);
            if ($parent) {
                $parent->update([
                    'relationship' => $data['relationship'][$key],
                    'last_name' => $data['last_name1'][$key],
                    'first_name' => $data['first_name1'][$key],
                    'email' => $data['email1'][$key],
                    'address' => $data['address'][$key],
                    'post_code' => $data['post_code1'][$key],
                    'occupation' => $data['occupation'][$key],
                    'contact' => $data['contact'][$key],
                ]);
                $student->parents()->attach([$parent->id]);
            } else {
                $parent = Parents::create([
                    'relationship' => $data['relationship'][$key],
                    'last_name' => $data['last_name1'][$key],
                    'first_name' => $data['first_name1'][$key],
                    'email' => $data['email1'][$key],
                    'address' => $data['address'][$key],
                    'post_code' => $data['post_code1'][$key],
                    'occupation' => $data['occupation'][$key],
                    'contact' => $data['contact'][$key],
                ]);
                // dd($parent);
                $student->parents()->attach([$parent->id]);
            }
        }

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
}
