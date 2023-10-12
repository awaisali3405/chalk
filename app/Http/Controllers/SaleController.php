<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Http\Request;

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
        $sale = Sale::create($data);
        foreach ($data['product_id'] as $key => $value) {
            SaleProduct::create([
                'sale_id' => $sale->id,
                'product_id' => $data['product_id'][$key],
                'quantity' => $data['quantity'][$key],
                'rate' => $data['rate'][$key],
                'amount' => $data['amount'][$key],
            ]);
        }
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
}
