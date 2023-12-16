<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use App\Models\StudentInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sale = Sale::all();
        return view('sale.index', compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sale.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        $amount = 0;
        foreach ($data['amount'] as $value) {
            $amount += $value;
        }
        $invoice = StudentInvoice::create([
            'student_id' => $data['student_id'],
            'amount' => $amount,
            'type' => 'Sale Invoice',
            'year_id' => $data['year_id'],
            'branch_id' => $data['branch_id'],
            'from_date' => auth()->user()->session()->start_date,
            'to_date' => auth()->user()->session()->end_date,
            'academic_year_id' => auth()->user()->session()->id,
            'date' => $data['date']

        ]);
        $invoice->update([
            'code' => "B00" . $invoice->id . '/' . auth()->user()->session()->InvoiceYearCode()
        ]);
        $sale = Sale::create([
            'branch_id' => $data['branch_id'],
            'year_id' => $data['year_id'],
            'key_stage_id' => $data['key_stage_id'],
            'student_id' => $data['student_id'],
            'invoice_id' => $invoice->id,
            'date' => $data['date'],
            'academic_year_id' => auth()->user()->session()->id
        ]);

        foreach ($data['product'] as $key => $value) {
            SaleProduct::create([
                'sale_id' => $sale->id,
                'product_id' => $data['product'][$key],
                'quantity' => $data['quantity'][$key],
                'rate' => $data['rate'][$key],
                'amount' => $data['amount'][$key],
                'academic_year_id' => auth()->user()->session()->id
            ]);
        }
        // CashFlow::create([
        //     'date' => $sale->date,
        //     'branch_id' => $sale->branch_id,
        //     'description' => "Sale To " . $sale->student->name() . "Qty(" . $sale->product->sum('quantity') . ")",
        //     'mode' => "Cash",
        //     'type' => "Sale",
        //     'in' => $sale->productSum(),
        // ]);
        Session::flash('action', route("invoice.print", $invoice->id));
        return redirect()->route('sale.index')->withSuccess(__('Create Success'));
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
        $sale = Sale::find($id);
        return view('sale.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', '_method');
        $sale = Sale::find($id);
        $sale->update($data);
        $sale->product->delete();
        foreach ($data['product_id[]'] as $key => $value) {
            SaleProduct::create([
                'sale_id' => $sale->id,
                'product_id' => $data['product_id[]'][$key],
                'quantity' => $data['quantity[]'][$key],
                'rate' => $data['rate[]'][$key],
                'amount' => $data['amount[]'][$key],
            ]);
        }
        return redirect()->route('sales.index')->withSuccess(__('Create Success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getData($id)
    {
        $product = Product::find($id);
        $data['quantity'] = $product->remainingProduct();
        $data['rate'] = $product->rate();
        $data['rrp'] = $product->purchase->max('rate');
        return response()->json(['data' => $data]);
    }
}
