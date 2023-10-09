<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Branch;
use App\Models\Parents;
use App\Models\student;
use App\Models\enquirySubject;
use App\Models\EnquiryUpload;
use App\Models\KeyStage;
use App\Models\Paper;
use App\Models\ScienceType;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    public function __construct()
    {
        $branch = Branch::all();
        View::share('branch', $branch);
        $year = Year::all();
        View::share('year', $year);
        $keyStage = KeyStage::all();
        View::share('keyStage', $keyStage);
        $subject = Subject::all();
        View::share('subject', $subject);
        $board = Board::all();
        View::share('board', $board);
        $scienceType = ScienceType::all();
        View::share('scienceType', $scienceType);
        $paper = Paper::all();
        View::share('paper', $paper);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = student::all();
        return view('student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enquirySubject = enquirySubject::where('student_id', null)->where('enquiry_id', null)->get();
        return view('student.add', compact('enquirySubject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->except('_token');
        // dd($data, new student);
        if (isset($request->profile_pic)) {
            $data['profile_pic'] =   $this->saveImage($request->profile_pic);
        } else {
            $data['profile_pic'] = 'images/avatar/1.png';
        }
        $student = Student::create($data);


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
        $subject = enquirySubject::whereIn('id', $data['enquiry_subject'])->update([
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
        $student = student::find($id);
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

        $student = student::find($id);
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
        $student = student::find($id);
        return view('student.note', compact('student'));
    }
    public function noteStore(Request $request, $id)
    {
        $data = $request->except('_token');
        // dd($data);
        student::find($id)->update([
            'note' => $request->note
        ]);
        return redirect()->route('student.index')->with('success', 'Branch Updated Successfully');
    }
    public function upload($id)
    {

        $student = student::find($id);
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
}
