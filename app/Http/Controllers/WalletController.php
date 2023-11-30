<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallet = Wallet::all();
        return view('wallet.index', compact('wallet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallet.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        $wallet =  Wallet::create($data);
        $wallet->student->update([

            'balance' => $wallet->student->balance + $data['amount']
        ]);

        return redirect()->route('wallet.index')->with(['success' => 'Wallet Created Successfully']);
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
        $wallet = Wallet::find($id);
        return view('wallet.edit', compact('wallet'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token');
        $wallet = Wallet::find($id);
        if ($wallet->amount != $data['amount']) {
            $deduct = $data['amount'] - $wallet->amount;
            $wallet->student->update([
                'balance' => $wallet->student->balance + $deduct
            ]);
            $wallet->update($data);
        } else {
            $wallet->update($data);
        }


        return redirect()->route('wallet.index')->with('success', 'Wallet Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
