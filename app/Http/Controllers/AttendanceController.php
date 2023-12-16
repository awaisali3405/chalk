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

                $student = $student->whereIn('year_id', request()->get('year_id'));
            }
            if (request()->input('branch_id') != '') {

                $student = $student->where('branch_id', $request->branch_id);
            }
            $student = $student->whereHas('promotionDetail', function ($query) {
                $query->where('academic_year_id', auth()->user()->session()->id);
            })->get();
        } else {
            $student = Student::where('active', true)->whereHas('promotionDetail', function ($query) {
                $query->where('academic_year_id', auth()->user()->session()->id);
            })->get();
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
                // dd(request()->get('year_id'));
                $student = $student->whereIn('year_id', request()->get('year_id'));
            }
            if (request()->input('branch_id') != '') {

                $student = $student->where('branch_id', $request->branch_id);
            }
            $student = $student->where('active', true)->where('is_promoted', false)->whereHas('promotionDetail', function ($query) {
                $query->where('academic_year_id', auth()->user()->session()->id);
            })->where('disable', false)->get();
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
        // dd($data);
        // foreach ($data['student'] as $key => $student) {
        foreach ($data['subject_id'] as $student => $studentSubjects) {
            $data1 = Student::find($student)->enquirySubject;
            foreach ($data1 as $key => $subject) {
                $attendance = Attendance::where('student_id', $student)->where('subject_id', $subject->id)->where('date', $data['date'])->first();
                if ($attendance) {
                    if ($data['status'][$student][$subject->id]) {

                        $attendance->update([
                            'status' => $data['status'][$student][$subject->id],
                            'note' => $data['note'][$student][$subject->id],
                        ]);
                    } else {
                        $attendance->delete();
                    }
                } else {
                    // dd($data['status'][$student]);
                    if (isset($data['status'][$student][$subject->id])) {

                        $attendance =  Attendance::create([
                            'student_id' => $student,
                            'subject_id' => $subject->id,
                            'status' => $data['status'][$student][$subject->id],
                            'date' => $data['date'],
                            'note' => $data['note'][$student][$subject->id],
                            'academic_year_id' => auth()->user()->session()->id
                        ]);
                    }
                }
            }
        }
        return redirect()->back()->with('success', 'Attendance Created Successfully');
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
