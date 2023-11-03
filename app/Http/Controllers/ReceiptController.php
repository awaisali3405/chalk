<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use App\Models\StudentInvoice;
use App\Models\StudentInvoiceReceipt;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // $invoice = StudentInvoice::find($id);
        // return view('receipt.index', compact('invoice'));
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
        $data = $request->except('_token');
        $data = StudentInvoiceReceipt::create($data);
        $invoice = StudentInvoice::find($request->invoice_id);
        // Transaction::create([
        //     'branch_id' => $invoice->student->branch_id,
        //     'year_id' => $invoice->student->year_id,
        //     'cash_out' => false,
        //     'amount' => $data['amount'],
        //     'description'=>$invoice->student->first_name." ",
        //     'date'
        // ]);
        if ($invoice->amount - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee')) - $invoice->receipt->sum('amount') <= 0) {
            $invoice->update([
                'is_paid' => 1
            ]);
            if ($invoice->type == "Refundable") {
                Refund::create([
                    'invoice_id' => $invoice->id
                ]);
            }
        }
        return redirect()->route('receipt.show', $request->invoice_id)->with('success', "Receipt Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = StudentInvoice::find($id);
        return view('receipt.index', compact('invoice'));
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
    public function print($id)
    {
        // Receipt::find();
    }
}
