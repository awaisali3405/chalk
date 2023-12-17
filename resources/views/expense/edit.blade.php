@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Expense </h4>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Expense </h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('expense.update', $expense->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Branch</label>
                                            <select name="branch_id" class="form-control" id="" required>
                                                <option value="" selected disabled>Select Branch</option>
                                                @foreach ($branch as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == $expense->branch_id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Acount Type</label>
                                            <select name="account_type" class="form-control" id="" required>
                                                <option value="" selected disabled>Select Account</option>
                                                @foreach ($expenseTypeAccount as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == $expense->account_type ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $expense->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <input type="text" class="form-control" name="description"
                                                value="{{ $expense->description }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <input type="number" name="amount" id="" class="form-control"
                                                value="{{ $expense->amount }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">VAT</label>
                                            <input type="text" name="tax" id="" class="form-control"
                                                value="{{ $expense->tax }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Net Amount</label>
                                            <input type="text" name="net" id="" class="form-control"
                                                value="{{ $expense->net }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mode</label>
                                            <select name="payment_type" class="form-control" id="">
                                                <option value="Cash"
                                                    {{ $expense->payment_type == 'Cash' ? 'selected' : '' }}>
                                                    Cash</option>
                                                <option value="Bank"
                                                    {{ $expense->payment_type == 'Bank' ? 'selected' : '' }}>Bank</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date</label>
                                            <input type="date" max="{{ auth()->user()->session()->end_date }}"
                                                min="{{ auth()->user()->session()->start_date }}" name="date"
                                                id="" class="form-control" value="{{ $expense->date }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">File</label>
                                            <input type="file" name="file" id="" class="form-control">
                                            @if ($expense->file)
                                                <a href="{{ asset($expense->file) }}" target="_blank">File</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('expense.index') }}" class="btn btn-light">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
