<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Branch;
use App\Models\Email;
use App\Models\Enquiry;
use App\Models\EnquirySubject;
use App\Models\EnquiryUpload;
use App\Models\KeyStage;
use App\Models\Paper;
use App\Models\ScienceType;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

use function PHPSTORM_META\type;

class EnquiryController extends Controller
{
    public function __construct()
    {
        // $branch = Branch::all();
        // View::share('branch', $branch);
        // $year = Year::all();
        // View::share('year', $year);
        // $keyStage = KeyStage::all();
        // View::share('keyStage', $keyStage);
        // $subject = Subject::all();
        // View::share('subject', $subject);
        // $board = Board::all();
        // View::share('board', $board);
        // $scienceType = ScienceType::all();
        // View::share('scienceType', $scienceType);
        // $paper = Paper::all();
        // View::share('paper', $paper);
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->input()) {
            $enquiry = new Enquiry();
            if ($request->input('branch_id')) {
                $enquiry = $enquiry->where('branch_id', $request->input('branch_id'));
            }
            if ($request->input('from_date')) {
                $enquiry = $enquiry->where('enquiry_date', '>=', $request->input('from_date'));
            }
            if ($request->input('to_date')) {
                $enquiry = $enquiry->where('enquiry_date', '<=', $request->input('to_date'));
            }
            if ($request->input('current_school')) {
                $enquiry = $enquiry->where('current_school_name', $request->input('current_school'));
            }
            if ($request->input('from_week')) {
                $enquiry = $enquiry->where('enquiry_date', '>=', auth()->user()->dateWeek($request->input('from_week')));
            }
            if ($request->input('to_week')) {
                $enquiry = $enquiry->where('enquiry_date', '<=', auth()->user()->dateWeek($request->input('to_week')));
            }
            $enquiry = $enquiry->get();
        } else {

            $enquiry = Enquiry::all();
        }
        return view('enquiry.index', compact('enquiry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enquirySubject = EnquirySubject::where('student_id', null)->where('enquiry_id', null)->delete();
        return view('enquiry.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['subject'] = json_encode($data['subject']);
        $enquiry = Enquiry::create($data);
        $email = Email::find(1);
        // dd(gettype($email->template));
        $email->template = str_replace('[Date]', $enquiry->assessment_date, $email->template);
        $email->template = str_replace('[Time]', $enquiry->assessment_time, $email->template);

        $email->template = str_replace("[Student's Name]", $enquiry->first_name . " " . $enquiry->last_name, $email->template);
        Mail::send('notification.enquiry', ['template' => $email->template], function ($message) use ($enquiry, $email) {
            $message->to($enquiry->email);
            $message->subject($email->name);
        });

        // dd($data);

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
    // Test
    public function test()
    {
        $email = Email::find(1);
        // dd(($email->template));
        $template = str_replace('[Date]', "2012-2-12", $email->template);
        $template = str_replace('[Time]', "23:00", $template);
        $template = str_replace("[Student's Name]", "Awais Ali", $template);
        dd($template);
        Mail::send('notification.enquiry', ['template' => $template], function ($message) {
            $message->to("awaisali3405@gmail.com");
            $message->subject('Enquiry Email');
        });
    }
}
