<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expense = Expense::all();
        return view('expense.index', compact('expense'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if (isset($data['file'])) {
            $data['file'] = $this->saveImage($data['file']);
        }
        $data['academic_year_id'] = auth()->user()->session()->id;
        Expense::create($data);
        return redirect()->route('expense.index')->with('success', 'Expense Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expense = Expense::find($id);

        return view('expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token');
        if (isset($data['file'])) {
            $data['file'] = $this->saveImage($data['file']);
        }
        Expense::find($id)->update($data);
        return redirect()->route('expense.index')->with('success', 'Expense Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Expense::find($id)->delete();
        return redirect()->route('expense.index')->with('success', 'Expense Deleted Successfully');
    }
}
