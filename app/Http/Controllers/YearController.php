<?php

namespace App\Http\Controllers;

use App\Models\KeyStage;
use App\Models\year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $year = Year::all();
        return view('year.index', compact('year'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keyStage = KeyStage::all();
        return view('year.add', compact('keyStage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        year::create($data);
        return redirect()->route('year.index')->with('success', 'year Created Successfully');
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
        $year = year::find($id);
        $keyStage = KeyStage::all();
        return view('year.edit', compact('year', 'keyStage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', 'method');
        year::find($id)->update($data);
        return redirect()->route('year.index')->with('success', 'Branch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
