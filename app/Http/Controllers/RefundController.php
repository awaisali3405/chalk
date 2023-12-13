<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\Refund;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $refund = Refund::where('paid_by_cash', 0)->where('paid_by_bank', 0)->get();
        return view('refund.index', compact('refund'));
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
    public function paidByBank($id)
    {
        $refund =  Refund::find($id);
        $refund->update([
            'paid_by_bank' => true
        ]);
        CashFlow::create([
            'date' => Carbon::now(),
            'branch_id' => $refund->invoice->branch_id,
            'description' => $refund->invoice->student->name() . " (" . auth()->user()->session()->period() . ") Refind",
            'mode' => "Bank",
            'type' => "Bank",
            'out' => $refund->invoice->amount,
        ]);
        return redirect()->route('refund.index')->with('success', 'Paid by Bank Successfully');
    }
    public function paidByCash($id)
    {
        Refund::find($id)->update([
            'paid_by_cash' => true
        ]);
        return redirect()->route('refund.index')->with('success', 'Paid by Cash Successfully');
    }
}
