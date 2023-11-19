<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $parent = Parents::latest()->get();
        return view('parent.index', compact('parent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parent.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:parent,email'
        ]);
        $data = $request->except('_token');
        $parent = Parents::create($data);
        if (isset($data['password'])) {

            $user = User::create([
                'email' => $data['email'],
                'name' => $data['given_name'],
                'password' => Hash::make($data['password']),
                'role_id' => 1
            ]);
            $parent->update([
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('parent.index')->with('success', 'Parent Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $parent = Parents::find($id);
        return view('parent.show', compact('parent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parent = Parents::find($id);
        return view('parent.edit', compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'email' => 'required|unique:parent,email,' . $id
        ]);
        $data = $request->except('_token');
        Parents::find($id)->update($data);
        return redirect()->route('parent.index')->with('success', 'Parent Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Parents::find($id)->delete();
        return redirect()->route('parent.index')->with('success', 'Parent Deleted Successfully');
    }
    public function getParentData($id)
    {
        $parent = Parents::find($id);
        return response()->json(['data' => $parent]);
    }
}
