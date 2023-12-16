<?php

namespace App\Http\Controllers;

use App\Models\AcademicCalender;
use App\Models\Board;
use App\Models\Branch;
use App\Models\Email;
use App\Models\Enquiry;
use App\Models\Parents;
use App\Models\EnquirySubject;
use App\Models\EnquiryUpload;
use App\Models\Student;
use App\Models\StudentInvoice;
use App\Models\StudentPromotionDetail;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StudentsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super admin') {

            if ($request->input()) {
                $student = new Student();
                if ($request->input('branch_id')) {
                    $student = $student->where('branch_id', $request->input('branch_id'));
                }
                if ($request->input('from_date')) {
                    $student = $student->where('admission_date', '>=', $request->input('from_date'));
                }
                if ($request->input('to_date')) {
                    $student = $student->where('admission_date', '<=', $request->input('to_date'));
                }
                if ($request->input('current_school')) {
                    $student = $student->where('current_school_name', $request->input('current_school'));
                }
                if ($request->input('from_week')) {
                    $student = $student->where('promotion_date', '>=', auth()->user()->dateWeek($request->input('from_week')));
                }
                if ($request->input('to_week')) {
                    $student = $student->where('promotion_date', '<=', auth()->user()->dateWeek($request->input('to_week')));
                }
                if ($request->input('know_about_us')) {
                    $student = $student->where('know_about_us', $request->input('know_about_us'));
                }
                if ($request->input('payment_period')) {
                    $student = $student->where('payment_period', $request->input('payment_period'));
                }
                $student = $student->where('active', true)->where('disable', false)->whereHas('promotionDetail', function ($query) {
                    $query->where('academic_year_id', auth()->user()->session()->id);
                })->get();
            } else {
                $student = Student::where('active', true)->where('disable', false)->whereHas('promotionDetail', function ($query) {
                    $query->where('academic_year_id', auth()->user()->session()->id);
                })->get();
            }
        } else if (auth()->user()->role->name == 'parent') {
            $student = Parents::where('user_id', auth()->user()->id)->first();
            if ($student) {
                $student = $student->student->where('disable', false);
                // dd($student);
            } else {
                $student = array();
            }
        }

        return view('student.index', compact('student'));
    }
    public function deActive(Request $request)
    {
        if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super admin') {

            if ($request->input()) {
                $student = new Student();
                if ($request->input('branch_id')) {
                    $student = $student->where('branch_id', $request->input('branch_id'));
                }
                if ($request->input('from_date')) {
                    $student = $student->where('admission_date', '>=', $request->input('from_date'));
                }
                if ($request->input('to_date')) {
                    $student = $student->where('admission_date', '<=', $request->input('to_date'));
                }
                if ($request->input('current_school')) {
                    $student = $student->where('current_school_name', $request->input('current_school'));
                }
                if ($request->input('from_week')) {
                    $student = $student->where('promotion_date', '>=', auth()->user()->dateWeek($request->input('from_week')));
                }
                if ($request->input('to_week')) {
                    $student = $student->where('promotion_date', '<=', auth()->user()->dateWeek($request->input('to_week')));
                }
                if ($request->input('know_about_us')) {
                    $student = $student->where('know_about_us', $request->input('know_about_us'));
                }
                if ($request->input('payment_period')) {
                    $student = $student->where('payment_period', $request->input('payment_period'));
                }
                $student = $student->where('active', true)->where('disable', false)->whereHas('promotionDetail', function ($query) {
                    $query->where('academic_year_id', auth()->user()->session()->id);
                })->get();
            } else {
                $student = Student::where('active', true)->where('disable', false)->whereHas('promotionDetail', function ($query) {
                    $query->where('academic_year_id', auth()->user()->session()->id);
                })->get();
            }
        } else if (auth()->user()->role->name == 'parent') {
            $student = Parents::where('user_id', auth()->user()->id)->first();
            if ($student) {
                $student = $student->student->where('disable', true);
                // dd($student);
            } else {
                $student = array();
            }
        }

        return view('student.disable', compact('student'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $EnquirySubject = EnquirySubject::where('student_id', null)->where('student_id', null)->delete();
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
            'student_id' => 'nullable',
            'profile_pic' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'phone_no' => 'nullable',
            'gender' => 'required',
            'nationality' => 'required',
            'place_of_birth' => 'required',
            'main_language' => 'nullable',
            'other_language' => 'nullable',
            'dob' => 'required',
            'current_school_name' => 'required',
            'branch_id' => 'nullable',
            'payment_period' => 'nullable',
            'year_id' => 'required',
            'key_stage_id' => 'required',
            'admission_date' => 'nullable',
            'deposit' => 'nullable',
            'registration_fee' => 'nullable',
            'annual_resource_fee' => 'nullable',
            'resource_discount' => 'nullable',
            'exercise_book_fee' => 'nullable',
            'fee' => 'nullable',
            'tax' => 'nullable',
            'fee_discount' => 'nullable',
            'total_fee' => 'nullable',
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
            'parent_id' => 'nullable'
        ]);
        if (isset($request->profile_pic)) {
            $data['profile_pic'] =   $this->saveImage($request->profile_pic);
        } else {
            $data['profile_pic'] = 'images/avatar/1.png';
        }
        // dd($data1, $data);
        if (auth()->user()->role->name == 'parent' && isset($data1['subject'])) {
            $data['parent_subject'] = json_encode($data1['subject']);
        }
        if (auth()->user()->role->name != 'parent') {
            $data['active'] = true;
            $data['promotion_date'] = $data['admission_date'];
        }
        if (isset($request->enquiry_id)) {
            $data['enquiry_id'] = $request->enquiry_id;
        }
        $student = Student::create($data);
        if (isset($request->enquiry_id)) {
            $enquiry = Enquiry::find($request->enquiry_id);
            $enquiry->upload()->update([
                'student_id' => $student->id
            ]);
            $student->update([
                'note' => $enquiry->note
            ]);
        }
        // dd($student->upload);
        if (auth()->user()->role->name == 'parent') {
            $student->parents()->attach([auth()->user()->parent->id]);
            if ($data1['last_name1']) {

                $parent = Parents::create([
                    'last_name' => $data1['last_name1'],
                    'first_name' => isset($data1['first_name1']) ? $data1['first_name1'] : '',
                    'given_name' => isset($data1['given_name1']) ? $data1['given_name1'] : '',
                    'gender' => isset($data1['gender1']) ? $data1['gender1'] : '',
                    'relationship' => isset($data1['relationship1']) ? $data1['relationship1'] : '',
                    'emp_status' => isset($data1['emp_status1']) ? $data1['emp_status1'] : '',
                    'company_name' => isset($data1['company_name1']) ? $data1['company_name1'] : '',
                    'work_phone_number' => isset($data1['work_phone_number1']) ? $data1['work_phone_number1'] : '',
                    'mobile_number' => isset($data1['mobile_number1']) ? $data1['mobile_number1'] : '',
                    'email' => isset($data1['email1']) ? $data1['email1'] : '',

                ]);
                $student->parents()->attach([$parent->id]);
            }
            // dd($student->parents, auth()->user()->parent->student, auth()->user()->parent, auth()->user()->id);
        } else {
            $student->update([
                'active' => true
            ]);
            $student->parents()->attach($data1['parent_id']);
            if ($data1['last_name1']) {

                $parent = Parents::create([
                    'last_name' => $data1['last_name1'],
                    'first_name' => isset($data1['first_name1']) ? $data1['first_name1'] : '',
                    'given_name' => isset($data1['given_name1']) ? $data1['given_name1'] : '',
                    'gender' => isset($data1['gender1']) ? $data1['gender1'] : '',
                    'relationship' => isset($data1['relationship1']) ? $data1['relationship1'] : '',
                    'emp_status' => isset($data1['emp_status1']) ? $data1['emp_status1'] : '',
                    'company_name' => isset($data1['company_name1']) ? $data1['company_name1'] : '',
                    'work_phone_number' => isset($data1['work_phone_number1']) ? $data1['work_phone_number1'] : '',
                    'mobile_number' => isset($data1['mobile_number1']) ? $data1['mobile_number1'] : '',
                    'email' => isset($data1['email1']) ? $data1['email1'] : '',
                ]);
                $student->parents()->attach([$parent->id]);
            }
            if (isset($data1['enquiry_subject'])) {
                $subject = EnquirySubject::whereIn('id', $data1['enquiry_subject']);
                $subject->update([
                    'student_id' => $student->id,
                    'year_id' => $student->year_id,
                    'academic_year_id' => auth()->user()->session()->id
                ]);
            }
            $rollNo =  $this->generateRollNo($student);
            StudentPromotionDetail::create([
                'student_id' => $student->id,
                'from_year_id' => 0,
                'to_year_id' => $student->year_id,
                'academic_year_id' => auth()->user()->session()->id, 'roll_no' => $rollNo
            ]);
            $this->generateInvoice($student, $request);
            // $subject1 = EnquirySubject::whereIn('id', $subject);
            $this->generateResource($request, $student, $subject);
            $email = Email::find(2);
            $email->name = str_replace("[Student's Name]", $student->first_name . " " . $student->last_name, $email->name);
            $email->template = str_replace("[Parent/Guardian's Name]", $student->parents[0]->given_name, $email->template);
            $email->template = str_replace("[Student's Name]", $student->name(), $email->template);
            $email->template = str_replace("[year]", $student->year->name, $email->template);
            $email->template = str_replace("[Start Date]", auth()->user()->ukFormat($student->admission_date), $email->template);

            // $template = str_replace("[Student's Name]", $enquiry->first_name . " " . $enquiry->last_name, $template);
            Mail::send('notification.enquiry', ['template' => $email->template], function ($message) use ($student, $email) {
                $message->to($student->parents[0]->email);
                $message->subject($email->name);
            });
        }

        // $subject = EnquirySubject::whereIn('id', $data1['student_subject'])->update([
        //     'student_id' => $student->id
        // ]);

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
        $data1 = $request->except('_token');
        // dd($data);
        $data = $request->validate([
            'student_id' => 'nullable',
            'profile_pic' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'phone_no' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'place_of_birth' => 'required',
            'main_language' => 'nullable',
            'other_language' => 'nullable',
            'dob' => 'required',
            'current_school_name' => 'required',
            'branch_id' => 'nullable',
            'payment_period' => 'nullable',
            'year_id' => 'nullable',
            'key_stage_id' => 'nullable',
            'admission_date' => 'nullable',
            'deposit' => 'nullable',
            'registration_fee' => 'nullable',
            'annual_resource_fee' => 'nullable',
            'resource_discount' => 'nullable',
            'exercise_book_fee' => 'nullable',
            'fee' => 'nullable',
            'tax' => 'nullable',
            'fee_discount' => 'nullable',
            'total_fee' => 'nullable',
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
            'parent_id' => 'nullable'
        ]);
        // $data = $request->except('_token', 'method');

        if (isset($request->profile_pic)) {
            $data['profile_pic'] =   $this->saveImage($request->profile_pic);
        }
        $student = Student::find($id);
        $data['promotion_date'] = $data['admission_date'];

        if (auth()->user()->role->name != 'parent' && !$student->active) {
            $data['active'] = true;

            // StudentPromotionDetail::create([
            //     'student_id' => $student->id,
            //     'from_year_id' => 0,
            //     'to_year_id' => $student->year_id,
            //     'academic_year_id' => auth()->user()->session()->id, 'roll_no' => $rollNo
            // ]);
            $student->update($data);
            $this->generateInvoice($student, $request);
            $subject = $student->EnquirySubject()->pluck('id')->toArray();
            // dd($subject);



            $email = Email::find(2);
            // dd(gettype($email->template));
            $email->name = str_replace("[Student's Name]", $student->first_name . " " . $student->last_name, $email->name);
            $email->template = str_replace("[Parent/Guardian's Name]", $student->parents[0]->given_name, $email->template);
            $email->template = str_replace("[Student's Name]", $student->name(), $email->template);
            $email->template = str_replace("[year]", $student->year->name, $email->template);
            $email->template = str_replace("[Start Date]", $student->admission_date, $email->template);

            Mail::send('notification.enquiry', ['template' => $email->template], function ($message) use ($student, $email) {
                $message->to($student->parents[0]->email);
                $message->subject($email->name);
            });
        }
        if ($student->is_promoted) {
            $data['is_promoted'] = false;
            $this->generateInvoice($student, $request);
        }
        if (isset($data1['enquiry_subject'])) {
            $subject = EnquirySubject::whereIn('id', $data1['enquiry_subject']);
            // dd($subject->get());
            $subject->update([
                'student_id' => $student->id,
                'year_id' => $student->year_id,
                'academic_year_id' => auth()->user()->session()->id
            ]);
            $this->generateResource($request, $student, $subject);
        }
        $student->update($data);
        if (isset($data1['enquiry_subject'])) {
            $rollNo =  $this->generateRollNo($student);
            StudentPromotionDetail::create([
                'student_id' => $student->id,
                'from_year_id' => 0,
                'to_year_id' => $student->year_id,
                'academic_year_id' => auth()->user()->session()->id, 'roll_no' => $rollNo
            ]);
        }
        // dd($data, $student);
        if (auth()->user()->role->name == 'parent') {
            $student->parents()->detach();
            if ($data1['last_name1']) {
                $student->parents()->attach([auth()->user()->parent->id]);
                if ($student->parents->count() > 1) {
                    $parent = Parents::find($student->parents[1]->id);
                    $parent->update([
                        'last_name' => $data1['last_name1'],
                        'first_name' => isset($data1['first_name1']) ? $data1['first_name1'] : ' ',
                        'given_name' => isset($data1['given_name1']) ? $data1['given_name1'] : ' ',
                        'gender' => isset($data1['gender1']) ? $data1['gender1'] : '',
                        'relationship' => isset($data1['relationship1']) ? $data1['relationship1'] : '',
                        'emp_status' => isset($data1['emp_status1']) ? $data1['emp_status1'] : '',
                        'company_name' => isset($data1['company_name1']) ? $data1['company_name1'] : '',
                        'work_phone_number' => isset($data1['work_phone_number1']) ? $data1['work_phone_number1'] : '',
                        'mobile_number' => isset($data1['mobile_number1']) ? $data1['mobile_number1'] : '',
                        'email' => isset($data1['email1']) ? $data1['email1'] : '',
                    ]);
                } else {
                    $parent = Parents::create([
                        'last_name' => $data1['last_name1'],
                        'first_name' => isset($data1['first_name1']) ? $data1['first_name1'] : ' ',
                        'given_name' => isset($data1['given_name1']) ? $data1['given_name1'] : ' ',
                        'gender' => isset($data1['gender1']) ? $data1['gender1'] : '',
                        'relationship' => isset($data1['relationship1']) ? $data1['relationship1'] : '',
                        'emp_status' => isset($data1['emp_status1']) ? $data1['emp_status1'] : '',
                        'company_name' => isset($data1['company_name1']) ? $data1['company_name1'] : '',
                        'work_phone_number' => isset($data1['work_phone_number1']) ? $data1['work_phone_number1'] : '',
                        'mobile_number' => isset($data1['mobile_number1']) ? $data1['mobile_number1'] : '',
                        'email' => isset($data1['email1']) ? $data1['email1'] : '',
                    ]);
                }
                $student->parents()->attach([$parent->id]);
            }
        } else {
            if ($data1['last_name1']) {
                if ($student->parents->count() > 1) {
                    $parent = Parents::find($student->parents[1]->id);
                    $parent->update([
                        'last_name' => $data1['last_name1'],
                        'first_name' => isset($data1['first_name1']) ? $data1['first_name1'] : '',
                        'given_name' => isset($data1['given_name1']) ? $data1['given_name1'] : '',
                        'gender' => isset($data1['gender1']) ? $data1['gender1'] : '',
                        'relationship' => isset($data1['relationship1']) ? $data1['relationship1'] : '',
                        'emp_status' => isset($data1['emp_status1']) ? $data1['emp_status1'] : '',
                        'company_name' => isset($data1['company_name1']) ? $data1['company_name1'] : '',
                        'work_phone_number' => isset($data1['work_phone_number1']) ? $data1['work_phone_number1'] : '',
                        'mobile_number' => isset($data1['mobile_number1']) ? $data1['mobile_number1'] : '',
                        'email' => isset($data1['email1']) ? $data1['email1'] : '',
                    ]);
                } else {
                    // dd(isset($data1['email1']), $data1['email1']);
                    $parent = Parents::create([
                        'last_name' => $data1['last_name1'],
                        'first_name' => isset($data1['first_name1']) ? $data1['first_name1'] : '',
                        'given_name' => isset($data1['given_name1']) ? $data1['given_name1'] : '',
                        'gender' => isset($data1['gender1']) ? $data1['gender1'] : '',
                        'relationship' => isset($data1['relationship1']) ? $data1['relationship1'] : '',
                        'emp_status' => isset($data1['emp_status1']) ? $data1['emp_status1'] : '',
                        'company_name' => isset($data1['company_name1']) ? $data1['company_name1'] : '',
                        'work_phone_number' => isset($data1['work_phone_number1']) ? $data1['work_phone_number1'] : '',
                        'mobile_number' => isset($data1['mobile_number1']) ? $data1['mobile_number1'] : '',
                        'email' => isset($data1['email1']) ? $data1['email1'] : '',
                    ]);
                }
                $student->parents()->detach();
                // dd($student->parents->count());
                $student->parents()->attach($data1['parent_id']);
                $student->parents()->attach([$parent->id]);
            }
        }
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
        if (str_contains(url()->current(), 'request')) {
            return redirect()->route('student.request')->with('success', 'Student Updated Successfully');
        } else {
            return redirect()->route('student.index')->with('success', 'Student Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::find($id)->delete();
        return redirect()->back()->with('success', 'Student Deleted Successfully.');
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
        if (str_contains(url()->current(), 'request')) {
            return redirect()->route('student.request')->with('success', 'Branch Updated Successfully');
        } else {
            return redirect()->route('student.index')->with('success', 'Branch Updated Successfully');
        }
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
    public function request(Request $request)
    {
        if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super admin') {

            if ($request->input()) {
                $student = new Student();
                if ($request->input('branch_id')) {
                    $student = $student->where('branch_id', $request->input('branch_id'));
                }
                if ($request->input('from_date')) {
                    $student = $student->where('admission_date', '>=', $request->input('from_date'));
                }
                if ($request->input('to_date')) {
                    $student = $student->where('admission_date', '<=', $request->input('to_date'));
                }
                if ($request->input('current_school')) {
                    $student = $student->where('current_school_name', $request->input('current_school'));
                }
                if ($request->input('from_week')) {
                    $student = $student->where('admission_date', '>=', auth()->user()->dateWeek($request->input('from_week')));
                }
                if ($request->input('to_week')) {
                    $student = $student->where('admission_date', '<=', auth()->user()->dateWeek($request->input('to_week')));
                }
                $student = $student->where('active', false)->get();
            } else {
                $student = Student::where('active', false)->get();
            }
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
    public function disable(Request $request)
    {
        if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super admin') {

            if ($request->input()) {
                $student = new Student();
                if ($request->input('branch_id')) {
                    $student = $student->where('branch_id', $request->input('branch_id'));
                }
                if ($request->input('from_date')) {
                    $student = $student->where('admission_date', '>=', $request->input('from_date'));
                }
                if ($request->input('to_date')) {
                    $student = $student->where('admission_date', '<=', $request->input('to_date'));
                }
                if ($request->input('current_school')) {
                    $student = $student->where('current_school_name', $request->input('current_school'));
                }
                if ($request->input('from_week')) {
                    $student = $student->where('admission_date', '>=', auth()->user()->dateWeek($request->input('from_week')));
                }
                if ($request->input('to_week')) {
                    $student = $student->where('admission_date', '<=', auth()->user()->dateWeek($request->input('to_week')));
                }
                if ($request->input('know_about_us')) {
                    $student = $student->where('know_about_us', $request->input('know_about_us'));
                }
                $student = $student->where('is_disable', true)->where('is_disable', false)->whereHas('promotionDetail', function ($query) {
                    $query->where('academic_year_id', auth()->user()->session()->id);
                })->get();
            } else {
                $student = Student::where('is_disable', true)->where('is_disable', false)->whereHas('promotionDetail', function ($query) {
                    $query->where('academic_year_id', auth()->user()->session()->id);
                })->get();
            }
        } else if (auth()->user()->role->name == 'parent') {
            $student = Parents::where('user_id', auth()->user()->id)->first();
            if ($student) {
                $student = $student->student->where('is_disable', false);
            } else {
                $student = array();
            }
        }

        return view('student.index', compact('student'));
    }
    public function getStudent($id)
    {
        $year = Year::find($id);
        $string = '<option value="">-</option>';
        // dd($year);
        foreach ($year->student->where('disable', false) as $key => $value) {

            $string .= "<option value='" . $value->id . "'>" . $value->first_name . "</option>";
        }
        return response()->json(['data' => $string]);
    }
    public function getStudentBranch($id, $branch)
    {
        $year = Year::find($id);
        $string = '<option value="">-</option>';
        // dd($year);
        foreach ($year->student->where('branch_id', $branch)->where('disable', false) as $key => $value) {

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
        foreach ($student->EnquirySubject as $key => $value) {
            $html .= "<option value='" . $value->id . "'>" . $value->subject->name . "</option>";
        }
        return response()->json(['data' => $student, 'html' => $html]);
    }
    public function statementPrint($id)
    {
        $student = Student::find($id);
        return view('student.print.statement', compact('student'));
    }
    public function generateInvoice($student, $request)
    {
        $student = Student::find($student->id);
        if ($request->deposit > 0) {

            $invoice = StudentInvoice::create([
                'student_id' => $student->id,
                'amount' => $request->deposit,
                'type' => 'Refundable',
                'tax' => 0,
                'from_date' => auth()->user()->session()->start_date,
                'to_date' => auth()->user()->session()->end_date,
                'branch_id' => $student->branch_id,
                'year_id' => $student->currentYear()->id,
                'academic_year_id' => auth()->user()->session()->id
            ]);
            $invoice->update([
                'code' => "F00" . $invoice->id . '/' . auth()->user()->session()->InvoiceYearCode()
            ]);
        }
        if ($request->registration_fee > 0) {


            $invoice = StudentInvoice::create([
                'student_id' => $student->id,
                'amount' => $request->registration_fee,
                'type' => 'Registration',
                'tax' => $request->tax,
                'from_date' => auth()->user()->session()->start_date,
                'to_date' => auth()->user()->session()->end_date,
                'branch_id' => $student->branch_id,
                'year_id' => $student->currentYear()->id,
                'academic_year_id' => auth()->user()->session()->id
            ]);
            $invoice->update([
                'code' => "A00" . $invoice->id . '/' . auth()->user()->session()->InvoiceYearCode()
            ]);
            // $invoice->student()->
        }
        // if ($request->annual_resource_fee + $request->exercise_book_fee > 0) {

        //     $invoice = StudentInvoice::create([
        //         'student_id' => $student->id,
        //         'amount' => $request->annual_resource_fee + $request->exercise_book_fee,
        //         'type' => 'Resource Fee',
        //         'tax' => 0,
        //         'from_date' => auth()->user()->session()->start_date,
        //         'to_date' => auth()->user()->session()->end_date,
        //         'branch_id' => $student->branch_id,
        //         'year_id' => $student->currentYear()->id,
        //         'academic_year_id' => auth()->user()->session()->id
        //     ]);
        // }
    }
    public function promote($id, Request $request)
    {
        $student = Student::find($id);
        $student->update([
            'year_id' => $request->year_id,
            'is_promoted' => true,
            'promotion_date' => AcademicCalender::find($request->academic_year_id)->start_date,
            'total_fee' => 0,
            'deposit' => 0,
            'registration_fee' => 0,
            'annual_resource_fee' => 0,
            'resource_discount' => 0,
            'exercise_book_fee' => 0,
            'fee' => 0,
            'fee_discount' => 0,
        ]);
        $rollNo =  $this->generatePromotionRollNo($student, $request);
        StudentPromotionDetail::create([
            'student_id' => $student->id,
            'from_year_id' => $student->year_id,
            'to_year_id' => $request->year_id,
            'academic_year_id' => $request->academic_year_id,
            'roll_no' => $rollNo
        ]);
        $student->invoice()->where('is_paid', false)->whereHas('receipt', function ($query) {
            $query->where('id', '!=', 0);
        }, '=', 0)->update(
            [
                'academic_year_id' => $request->academic_year_id
            ]
        );
        return redirect()->back()->with('success', 'Student Promoted Successfully.');
    }
    public function generateResource($request, $student, $subject)
    {

        $annual_resource_fee = $this->sumRate($subject->get());
        $exercise_book_fee = $this->sumBookRate($subject->get());
        $student = Student::find($student->id);
        $invoice = StudentInvoice::create([
            'student_id' => $student->id,
            'amount' => $annual_resource_fee + $exercise_book_fee,
            'type' => 'Resource Fee',
            'tax' => 0,
            'from_date' => auth()->user()->session()->start_date,
            'to_date' => auth()->user()->session()->end_date,
            'branch_id' => $student->branch_id,
            'year_id' => $student->currentYear()->id,
            'academic_year_id' => auth()->user()->session()->id
        ]);
        $subject->update([
            'resource_invoice_id' => $invoice->id
        ]);
        $invoice->update([
            'code' => "R00" . $invoice->id . '/' . auth()->user()->session()->InvoiceYearCode()
        ]);
    }
    public function sumRate($subject)
    {
        $annual_resource_fee = 0;
        foreach ($subject as $value) {
            $annual_resource_fee += $value->subject->rate;
        }
        return $annual_resource_fee;
    }
    public function sumBookRate($subject)
    {
        $exercise_book_fee = 0;
        foreach ($subject as $value) {
            $exercise_book_fee += $value->subject->book_rate;
        }
        return $exercise_book_fee;
    }
    public function generateRollNo($student)
    {
        if ($student->id < 10) {
            $id = "00" . $student->id;
        } elseif ($student->id < 100) {
            $id = "0" . $student->id;
        } else {
            $id = $student->id;
        }
        $rollNo = $student->branch->short_code . "/" . auth()->user()->session()->yearCode() . "/" . $id;
        $student->update([
            'roll_no' => $rollNo
        ]);
        return $rollNo;
    }
    public function generatePromotionRollNo($student, $request)
    {
        $academicYear = AcademicCalender::find($request->academic_year_id);
        if ($student->id < 10) {
            $id = "00" . $student->id;
        } elseif ($student->id < 100) {
            $id = "0" . $student->id;
        } else {
            $id = $student->id;
        }
        $rollNo = $student->branch->short_code . "/" . $academicYear->yearCode() . "/" . $id;
        $student->update([
            'roll_no' => $rollNo
        ]);
        return $rollNo;
    }
}
