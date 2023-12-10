<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\Refund;
use App\Models\StudentInvoice;
use App\Models\StudentInvoiceReceipt;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReceiptController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
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
            if ($data['credit_note']) {
                $data['credit_discount'] = $data['discount'];
                $data['discount'] = 0;
            }
            $receipt = StudentInvoiceReceipt::create($data);
            if (!str_contains($data['mode'], 'Wallet')) {
                CashFlow::create([
                    'date' => $receipt->date,
                    'branch_id' => $receipt->invoice->branch_id,
                    'description' => $receipt->invoice->student->name() . " (" . auth()->user()->session()->period() . ")",
                    'mode' => $receipt->mode,
                    'type' => $receipt->invoice->type == "Refundable" ? "Deposit" : $receipt->invoice->type,
                    'in' => $receipt->amount,
                ]);
            }
            if ($data['mode'] == "Cash_Wallet") {
                $receipt->invoice->student()->update([
                    'cash_balance' => $receipt->invoice->student->cash_balance - $data['amount']
                ]);
            } else if ($data['mode'] == "Bank_Wallet") {
                $receipt->invoice->student()->update([
                    'bank_balance' => $receipt->invoice->student->bank_balance - $data['amount']
                ]);
            }
            if ($data['credit_note']) {
                $receipt->invoice->student()->update([
                    'credit_note' => $receipt->invoice->student->credit_note - $data['discount']
                ]);
            }
            Wallet::where('student_id', $receipt->invoice->student->id)->update([
                'fixed' => 1
            ]);
            if ($data['add_to_wallet']) {
                $wallet = Wallet::create([
                    'branch_id' => $receipt->invoice->student->branch_id,
                    'year_id' => $receipt->invoice->student->currentYear()->id,
                    'student_id' => $receipt->invoice->student_id,
                    'description' => "Amount Received by ",
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
                    'mode' => $data['mode'] == "Cash" ? 'Cash_Wallet' : ($data['mode'] == "Bank" ? 'Bank_Wallet' : "Cash_Wallet"),
                    'type' => $data['mode'] == "Cash" ? 'Cash_Wallet' : ($data['mode'] == "Bank" ? 'Bank_Wallet' : "Cash_Wallet" . " (" . ($receipt->invoice->type == "Refundable" ? "Deposit" : $receipt->invoice->type) . ")"),
                    'in' => $data['add_to_wallet'],
                ]);
                if ($data['mode'] == "Cash") {

                    $receipt->invoice->student()->update([
                        'cash_balance' => $receipt->invoice->student->cash_balance + $data['add_to_wallet']
                    ]);
                } else {
                    $receipt->invoice->student()->update([
                        'bank_balance' => $receipt->invoice->student->bank_balance + $data['add_to_wallet']
                    ]);
                }
            }
            $invoice = StudentInvoice::find($request->invoice_id);
            if ($invoice->amount - ($invoice->receipt->sum('discount') + $invoice->receipt->sum('credit_discount') - $invoice->receipt->sum('late_fee')) - $invoice->receipt->sum('amount') <= 0) {
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
            Session::flash('action', route("invoice.print", $invoice->id));
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
