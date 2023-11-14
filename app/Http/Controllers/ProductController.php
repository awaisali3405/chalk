<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Product Created Successfully');
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
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', '_method');

        Product::find($id)->update($data);
        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
    }
    public function getProduct($year, $branch)
    {
        $product = Product::where('year_id', $year)->where('branch_id', $branch)->get();
        $string = '<option value="">-</option>';
        foreach ($product as $key => $value) {
            $string .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        }
        return response()->json(['data' => $string]);
    }
    public function transfer($id)
    {
        $product = Product::find($id);
        return view('product.transfer.index', compact('product'));
    }
    public function transferPost(Request $request, $id)
    {
        $data = $request->except('_token');
        $o_product = Product::find($id);

        $product = Product::where('branch_id', $request->branch_id)->where('year_id', $request->year_id)->first();
        $transfer = false;
        $remaining = $request->quantity;
        foreach ($o_product->purchase as $value) {
            if (!$transfer) {
                if ($value->quantity >= $remaining) {
                    $newQuantity = $value->quantity - $remaining;
                    $value->update([
                        'quantity' => $newQuantity
                    ]);
                    if ($product) {
                        Purchase::create([
                            'branch_id' => $request->branch_id,
                            'supplier_id' => $value->supplier_id,
                            'year_id' => $request->year_id,
                            'key_stage_id' => $value->key_stage_id,
                            'product_id' => $product->id,
                            'quantity' => $data['quantity'],
                            'rate' => $data['rate'],
                            'amount' => $data['rate'] * $data['quantity'],
                            'mode' => $value->mode,
                            'date' => $o_product->purchase[0]->date,
                        ]);
                    } else {
                        $product =  Product::create([
                            'branch_id' => $request->branch_id,
                            'year_id' => $request->year_id,
                            'name' => $o_product->name
                        ]);
                        Purchase::create([
                            'branch_id' => $request->branch_id,
                            'supplier_id' => $o_product->purchase[0]->supplier_id,
                            'year_id' => $request->year_id,
                            'key_stage_id' => $o_product->purchase[0]->key_stage_id,
                            'product_id' => $product->id,
                            'quantity' => $data['quantity'],
                            'rate' => $data['rate'],
                            'amount' => $data['rate'] * $data['quantity'],
                            'mode' => $o_product->purchase[0]->mode,
                            'date' => $o_product->purchase[0]->date,
                        ]);
                    }
                    $transfer = true;
                } else {
                    $remaining = $value->quantity - $remaining;
                    $value->delete();
                }
            }
        }
        return redirect()->route('product.index')->with('success', 'Transfer Completed Successfully.');
    }
}
