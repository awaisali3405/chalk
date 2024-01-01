<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\StudentInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceRefundController extends Controller
{
    public function create($id)
    {
        $invoice = StudentInvoice::find($id);
        // dd($invoice);
        return view('invoice.refund.index', compact('invoice'));
    }
    public function store($id, Request $request)
    {
        $data = $request->except('_token');
        $invoice = StudentInvoice::find($id);
        $refund =  $invoice->invoiceRefund()->create($data);
        if ($invoice->remainingAmount() > 0) {
            $invoice->update([
                'refunded_discount' => $invoice->remainingAmount(),
            ]);
        }
        CashFlow::create([
            'date' => $data['date'],
            'branch_id' => $invoice->branch_id,
            'description' => $invoice->student->name() . " (" . auth()->user()->session()->period() . ") Refund",
            'mode' => $data['mode'],
            'type' => "Refund",
            'out' => $data['amount'],
            'academic_year_id' => auth()->user()->session()->id
        ]);
        return redirect()->route('invoice.show', $invoice->student_id)->with('success', 'Invoice Refunded Successfully.');
    }
}
