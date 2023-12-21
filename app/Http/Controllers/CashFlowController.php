<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\CashFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CashFlowController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = CashFlow::distinct('type')->pluck("type");
        View::share('type', $type);
        if ($request->input()) {
            $cashFlow = new CashFlow();
            if ($request->input('branch_id')) {
                $cashFlow = $cashFlow->where('branch_id', $request->input('branch_id'));
            }
            // dd($cashFlow->where('date', '>=', $request->form_date)->get(), $request->from_date);
            if ($request->from_date) {
                $cashFlow = $cashFlow->where('date', '>=', $request->from_date);
            }
            if ($request->to_date) {
                $cashFlow = $cashFlow->where("date", '<=', $request->to_date);
            }
            if ($request->from_week) {
                $cashFlow = $cashFlow->where("date", '>=', auth()->user()->dateWeek($request->from_week));
            }
            if ($request->to_week) {
                $cashFlow = $cashFlow->where("date", '<=', auth()->user()->dateWeek($request->to_week));
            }
            if ($request->mode) {
                $cashFlow = $cashFlow->where("mode", $request->mode);
            }
            if ($request->type &&  !in_array(null, $request->type)) {
                // dd($request->type);
                $cashFlow = $cashFlow->whereIn("type", $request->type);
            }

            $cashFlow = $cashFlow->where('mode', '!=', 'Wallet')->where('academic_year_id', auth()->user()->session()->id)->get();
        } else {
            $cashFlow = CashFlow::where('mode', '!=', 'Wallet')->where('academic_year_id', auth()->user()->session()->id)->get();
        }
        $mode = [
            'Cash',
            'Bank',
            'Cash_Wallet',
            'Bank_Wallet',
            'transfer'
        ];
        return view('cashflow.index', compact('cashFlow', 'mode'));
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
}
