<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\InvoiceRefunded;
use App\Models\Refund;
use App\Models\StudentInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $refund = Refund::all();
        return view('refund.index', compact('refund'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $refund = Refund::all();
        return view('refund.list', compact('refund'));
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
            'description' => $refund->invoice->student->name() . " (" . auth()->user()->session()->period() . ") Refund",
            'mode' => "Bank",
            'type' => "Refund",
            'out' => $refund->invoice->amount,
            'academic_year_id' => auth()->user()->session()->id
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
    public function unlock($id)
    {
        Refund::find($id)->update([
            'lock' => false
        ]);
        return redirect()->back()->with('success', 'Refund Unlock Successfully.');
    }
    public function pay($id)
    {
        $refund = Refund::find($id);
        return view('refund.form', compact('refund'));
    }
    public function payStore(Request $request)
    {
        $data = $request->except('_token');

        $data['description'] = "Amount Refunded by";
        $refund = InvoiceRefunded::create($data);
        CashFlow::create([
            'date' => $data['date'],
            'branch_id' => $refund->refund->branch_id,
            'description' => $refund->refund->invoice->student->name() . " (" . auth()->user()->session()->period() . ") Refund Transfer",
            'mode' => $data['mode'],
            'type' => "Refund",
            'out' => $refund->amount,
            'academic_year_id' => auth()->user()->session()->id
        ]);
        // CashFlow::create([
        //     'date' => $data['date'],
        //     'branch_id' => $refund->refund->branch_id,
        //     'description' => $refund->refund->invoice->student->name() . " (" . auth()->user()->session()->period() . ") Refund Transfer",
        //     'mode' => $data['mode'],
        //     'type' => "Refund",
        //     'in' => $refund->amount,
        //     'academic_year_id' => auth()->user()->session()->id
        // ]);
        return redirect()->route('refund.index')->with('success', 'Refunded Successfully.');
    }
    public function invoiceRefund($id)
    {
        $invoice = StudentInvoice::find($id);
        return view('invoice.refund.index', compact('invoice'));
    }
}
