<?php

namespace App\Http\Controllers;

use App\Models\scienceType;
use Illuminate\Http\Request;

class ScienceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scienceType = scienceType::all();
        return view('scienceType.index', compact('scienceType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scienceType.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        scienceType::create($data);
        return redirect()->route('scienceType.index')->with('success', 'scienceType Created Successfully');
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
        $scienceType = scienceType::find($id);
        return view('scienceType.edit', compact('scienceType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', 'method');
        scienceType::find($id)->update($data);
        return redirect()->route('scienceType.index')->with('success', 'Branch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
