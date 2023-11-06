<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->input()) {
            $student = new Student;
            if (request()->input('year_id') != '') {

                $student = $student->where('year_id', $request->year_id);
            }
            if (request()->input('branch_id') != '') {

                $student = $student->where('branch_id', $request->branch_id);
            }
            $student = $student->get();
        } else {
            $student = Student::where('active', true)->get();
        }
        // dd($student);
        return view('attendance.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (request()->input()) {
            $student = new Student;
            if (request()->input('year_id') != '') {

                $student = $student->where('year_id', $request->year_id);
            }
            if (request()->input('branch_id') != '') {

                $student = $student->where('branch_id', $request->branch_id);
            }
            $student = $student->get();
        } else {
            $student = array();
        }
        // dd($student);
        return view('attendance.add', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->except('_token');
        // foreach ($data['student'] as $key => $student) {
        foreach ($data['subject_id'] as $student => $studentSubjects) {
            foreach ($studentSubjects as $key => $subject) {
                $attendance = Attendance::where('student_id', $student)->where('subject_id', $subject)->where('date', $data['date'])->first();
                if ($attendance) {
                    $attendance->update([
                        'status' => $data['status'][$student][$subject],
                        'note' => $data['note'][$student][$subject],
                    ]);
                } else {
                    
                    $attendance =  Attendance::create([
                        'student_id' => $student,
                        'subject_id' => $subject,
                        'status' => $data['status'][$student][$subject],
                        'date' => $data['date'],
                        'note' => $data['note'][$student][$subject],
                    ]);
                }
            }
        }
        return redirect()->route('attendance.create')->with('success', 'Attendance Created Successfully');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        // $student = Student::find($id);
        // return
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
