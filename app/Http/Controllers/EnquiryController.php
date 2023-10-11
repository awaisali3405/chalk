<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Branch;
use App\Models\enquiry;
use App\Models\EnquirySubject;
use App\Models\EnquiryUpload;
use App\Models\KeyStage;
use App\Models\Paper;
use App\Models\ScienceType;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EnquiryController extends Controller
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
        $enquiry = Enquiry::all();
        return view('enquiry.index', compact('enquiry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enquirySubject = EnquirySubject::where('enquiry_id', null)->get();
        return view('enquiry.add', compact('enquirySubject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        // dd($data, $subject);
        $enquiry = Enquiry::create($data);
        $subject = EnquirySubject::whereIn('id', $data['enquiry_subject'])->update([
            'enquiry_id' => $enquiry->id
        ]);
        return redirect()->route('enquiry.index')->with('success', 'enquiry Created Successfully');
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
        $enquiry = Enquiry::find($id);
        return view('enquiry.edit', compact('enquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', 'method');
        Enquiry::find($id)->update($data);
        return redirect()->route('enquiry.index')->with('success', 'Branch Updated Successfully');
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
        $enquiry = Enquiry::find($id);
        return view('enquiry.note', compact('enquiry'));
    }
    public function noteStore(Request $request, $id)
    {
        $data = $request->except('_token');
        // dd($data);
        Enquiry::find($id)->update([
            'note' => $request->note
        ]);
        return redirect()->route('enquiry.index')->with('success', 'Branch Updated Successfully');
    }
    public function upload($id)
    {

        $enquiry = Enquiry::find($id);
        return view('enquiry.upload', compact('enquiry'));
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
        $enquiry = EnquiryUpload::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function register($id)
    {
        $enquiry = Enquiry::find($id);
        return view('enquiry.register', compact('enquiry'));
    }
}
