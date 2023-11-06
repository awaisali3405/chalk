<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
    public function transferPost(Request $request,$id)
    {
        $product = Product::where('branch_id', $request->branch_id)->where('year_id', $request->year_id)->first();
        if ($product) {
            
        }
    }
}
