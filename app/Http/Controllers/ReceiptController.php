<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\Refund;
use App\Models\StudentInvoice;
use App\Models\StudentInvoiceReceipt;
use App\Models\Transaction;
use App\Models\Wallet;
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
        $data['academic_year_id'] = auth()->user()->session()->id;
        if ($data['amount']) {

            $receipt = StudentInvoiceReceipt::create($data);
            CashFlow::create([
                'date' => $receipt->date,
                'branch_id' => $receipt->invoice->branch_id,
                'description' => $receipt->invoice->student->name() . " (" . auth()->user()->session()->period() . ")",
                'mode' => $receipt->mode,
                'type' => $receipt->invoice->type,
                'in' => $receipt->amount,
            ]);
            if ($data['mode'] == "Wallet") {
                $receipt->invoice->student()->update([
                    'balance' => $receipt->invoice->student->balance - $data['amount']
                ]);
                // $data['description'] = "Wallet Received By";
                // $data['amount'] = $data['add_to_wallet'];
                // $receipt = StudentInvoiceReceipt::create($data);
            }
            if ($data['add_to_wallet']) {
                $wallet = Wallet::create([
                    'branch_id' => $receipt->invoice->student->branch_id,
                    'year_id' => $receipt->invoice->student->currentYear()->id,
                    'student_id' => $receipt->invoice->student_id,
                    'description' => "Add From Receipt by",
                    'amount' => $data['add_to_wallet'],
                    'fixed' => 1,
                    'date' => $data['date'],
                    'mode' => $data['mode'],
                    'academic_year_id' => auth()->user()->session()->id
                ]);
                CashFlow::create([
                    'date' => $receipt->date,
                    'branch_id' => $receipt->invoice->branch_id,
                    'description' => $receipt->invoice->student->name() . " (" . auth()->user()->session()->period() . ")",
                    'mode' => $receipt->mode,
                    'type' => $receipt->invoice->type,
                    'in' => $receipt->amount,
                ]);
                $receipt->invoice->student()->update([
                    'balance' => $receipt->invoice->student->balance + $data['add_to_wallet']
                ]);
            }
            $invoice = StudentInvoice::find($request->invoice_id);
            if ($invoice->amount - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee')) - $invoice->receipt->sum('amount') <= 0) {
                $invoice->update([
                    'is_paid' => 1
                ]);
                if ($invoice->type == "Refundable") {
                    Refund::create([
                        'academic_year_id' => auth()->user()->session()->id,
                        'invoice_id' => $invoice->id
                    ]);
                }
            }
            return redirect()->route('receipt.show', $request->invoice_id)->with('success', "Receipt Created Successfully");
        } else {

            return redirect()->route('receipt.show', $request->invoice_id)->with('error', "Enter Balance To Pay Field");
        }
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
