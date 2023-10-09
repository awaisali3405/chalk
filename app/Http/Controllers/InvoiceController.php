<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentInvoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice = StudentInvoice::all();
        return view('invoice.index', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoice.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        StudentInvoice::create($data);
        return redirect()->route('invoice.index')->with('success', 'invoice Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = StudentInvoice::where('student_id', $id)->get();
        $student = Student::find($id);
        return view('invoice.show', compact('invoice', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = StudentInvoice::find($id);

        return view('invoice.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', 'method');
        StudentInvoice::find($id)->update($data);
        return redirect()->route('invoice.index')->with('success', 'Branch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
