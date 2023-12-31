@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Expense Type Account</h4>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Expense Type Account</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('expenseTypeAccount.update', $expenseTypeAccount->id) }}" method="post">
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
                                                        {{ $expenseTypeAccount->branch_id == $value->id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $expenseTypeAccount->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Type</label>
                                            <select name="type" class="form-control" id="">
                                                <option value="" selected disabled>Select Type</option>
                                                <option value="Withdraw"
                                                    {{ $expenseTypeAccount->type == 'Withdraw' ? 'selected' : '' }}>
                                                    Withdraw</option>
                                                <option value="Expense"
                                                    {{ $expenseTypeAccount->type == 'Expense' ? 'selected' : '' }}>
                                                    Expense</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="active" class="form-control" id="">
                                                <option value="1" {{ $expenseTypeAccount->active ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0" {{ !$expenseTypeAccount->active ? 'selected' : '' }}>
                                                    De Active</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('expenseTypeAccount.index') }}" class="btn btn-light">Cancel</a>
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
