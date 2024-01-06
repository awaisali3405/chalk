<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Student;
use App\Models\TeacherEnquiryInterview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('eventCalender.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function getEvent()
    {
        $student = Student::where('debt_collection', false)->where('disable', false)->get();
        $event = array();

        foreach ($student as $value) {
            $data['title'] = $value->name();
            if (!is_null($value->dob)) {
                $data['start'] = Carbon::parse($value->dob);
            } else {
                $data['start'] = null;
            }
            $data['className'] = 'bg-primary';

            array_push($event, $data);
        }
        $enquiry = Enquiry::all();
        foreach ($enquiry as $value) {
            $data['title'] = $value->name();
            if (!is_null($value->assessment_date)) {
                $data['start'] = Carbon::parse($value->assessment_date . ' ' . $value->assessment_time);
            } else {
                $data['start'] = null;
            }
            $data['className'] = 'bg-success';

            array_push($event, $data);
        }
        $interview = TeacherEnquiryInterview::all();
        foreach ($interview as $value) {
            $data['title'] = $value->teacherEnquiry->name();
            if (!is_null($value->date)) {
                $data['start'] = Carbon::parse($value->date . ' ' . $value->time);
            } else {
                $data['start'] = null;
            }
            $data['className'] = 'bg-warning';

            array_push($event, $data);
        }

        return response()->json([
            'data' => $event
        ]);
    }
}
