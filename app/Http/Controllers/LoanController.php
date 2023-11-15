<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffLoan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loan = StaffLoan::all();
        return view('loan.index', compact('loan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $loan = StaffLoan::create($data);
        return redirect()->route('loan.index')->with('success', 'Loan Created Successfully.');
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
    public function getStaff($id)
    {
        $staff = Staff::where('branch_id', $id)->get();
        $string = '<option value="">-</option>';
        foreach ($staff as $value) {
            if (count($staff->loan) <= 0) {

                $string .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }
        }
        return response()->json([
            'html' => $string
        ]);
    }
}
