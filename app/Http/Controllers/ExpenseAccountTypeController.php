<?php

namespace App\Http\Controllers;

use App\Models\ExpenseAccountType;
use Illuminate\Http\Request;

class ExpenseAccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenseTypeAccount = ExpenseAccountType::all();
        return view('expenseTypeAccount.index', compact('expenseTypeAccount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenseTypeAccount.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->except('_token');
        ExpenseAccountType::create($data);
        return redirect()->route('expenseTypeAccount.index')->with('success', 'Expense Account Type Created Successfully');
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
        $expenseTypeAccount = ExpenseAccountType::find($id);
        return view('expenseTypeAccount.edit', compact('expenseTypeAccount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token');
        ExpenseAccountType::find($id)->update($data);
        return redirect()->route('expenseTypeAccount.index')->with('success', 'Expense Account Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ExpenseAccountType::find($id)->delete();
        return redirect()->route('expenseTypeAccount.index')->with('success', 'Expense Account Type Deleted Successfully');
    }
}
