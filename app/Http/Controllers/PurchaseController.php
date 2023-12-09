<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchase = Purchase::all();

        return view('purchase.index', compact('purchase'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchase.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        $data['academic_year_id'] = auth()->user()->session()->id;
        if (!$data['discounted_amount']) {
            $data['discounted_amount'] = $data['amount'];
        }
        $purchase = Purchase::create($data);
        CashFlow::create([
            'date' => $purchase->date,
            'branch_id' => $purchase->branch_id,
            'description' => "Qty(" . $purchase->quantity . ") Paid by " . $purchase->mode,
            'mode' => $purchase->mode,
            'type' => "Purchase",
            'out' => $purchase->discounted_amount ? $purchase->discounted_amount : $purchase->amount,
        ]);
        return redirect()->route('purchase.index')->with('success', 'Purchase Created Successfully');
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
        $purchase = Purchase::find($id);
        return view('purchase.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', '_method');
        Purchase::find($id)->update($data);
        return redirect()->route('purchase.index')->with('success', 'Purchase Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
