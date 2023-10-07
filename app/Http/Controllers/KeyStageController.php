<?php

namespace App\Http\Controllers;

use App\Models\KeyStage;
use Illuminate\Http\Request;

class KeyStageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyStage = keyStage::all();
        return view('keyStage.index', compact('keyStage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keyStage.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        KeyStage::create($data);
        return redirect()->route('keyStage.index')->with('success', 'keyStage Created Successfully');
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
        $keyStage = KeyStage::find($id);
        return view('keyStage.edit', compact('keyStage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', 'method');
        KeyStage::find($id)->update($data);
        return redirect()->route('keyStage.index')->with('success', 'Branch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
