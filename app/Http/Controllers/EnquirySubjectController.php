<?php

namespace App\Http\Controllers;

use App\Models\EnquirySubject;
use App\Models\Subject;
use Illuminate\Http\Request;

class EnquirySubjectController extends Controller
{
    public function apiCreate(Request $request)
    {
        $data = $request->except('_token');
        $enquirySubject = EnquirySubject::create($data);
        $enquirySubject1 = new EnquirySubject;
        $enquirySubject1 =  $enquirySubject1->with('subject');
        if ($enquirySubject->board) {

            $enquirySubject1 =   $enquirySubject1->with('board');
        }
        if ($enquirySubject->paper) {
            $enquirySubject1 =  $enquirySubject1->with('paper');
        }
        if ($enquirySubject->scienceType) {
            $enquirySubject1 =   $enquirySubject1->with('scienceType');
        }
        if ($enquirySubject->lessonType) {
            $enquirySubject1 =   $enquirySubject1->with('lessonType');
        }
        $enquirySubject1 =  $enquirySubject1->find($enquirySubject->id);
        return response()->json([
            'message' => 'success',
            'data' => $enquirySubject1
        ]);
    }
    public function apiDelete($id)
    {
        $enquirySubject = EnquirySubject::whereId($id)->first();
        $enquirySubject->delete();
        return response()->json([
            'message' => 'success', 'data' => $enquirySubject->subject
        ]);
    }
}
