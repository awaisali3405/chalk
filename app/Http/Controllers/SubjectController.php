<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = subject::all();
        return view('subject.index', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $year = Year::all();
        return view('subject.add', compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        Subject::create($data);
        return redirect()->route('subject.index')->with('success', 'subject Created Successfully');
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
        $subject = subject::find($id);
        $year = year::all();
        return view('subject.edit', compact('subject', 'year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', 'method');
        subject::find($id)->update($data);
        return redirect()->route('subject.index')->with('success', 'Branch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getSubject($id)
    {
        $year = Year::find($id);
        $string = '<option value="">-</option>';
        foreach ($year as $key => $value) {
            $string .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        }
        return response()->json(['data' => $string]);
    }
}
