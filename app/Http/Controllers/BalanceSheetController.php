<?php

namespace App\Http\Controllers;

use App\Models\AcademicCalender;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BalanceSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $branch = Branch::all();
        View::share('branch', $branch);
        $academicCalender = AcademicCalender::all();
        View::share('academicCalender', $academicCalender);
    }
    public function index(Request $request)
    {
        if ($request->input()) {
            $branch_id = $request->input('branch_id');
            $academicYear = $request->input('academic_year_id');
        } else {
            $branch_id = 0;
            $academicYear = 0;
        }
        return view("balanceSheet.index", compact('branch_id', 'academicYear'));
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
}
