@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Edit Wallet</h4>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Wallet</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('wallet.update', $wallet->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Branch</label>
                                            <select name="branch_id" id="" class="form-control" required>
                                                <option value="">-</option>
                                                @foreach ($branch as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == $wallet->branch_id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Year</label>
                                            <select name="year_id" id="" class="form-control" required>
                                                <option value="">-</option>
                                                @foreach ($year as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == $wallet->year_id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Student</label>
                                            <select name="student_id" id="" class="form-control student" required>
                                                <option value="{{ $wallet->student_id }}">{{ $wallet->student->name() }}
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date</label>
                                            <input type="date" max="{{ auth()->user()->session()->end_date }}"
                                                min="{{ auth()->user()->session()->start_date }}" name="date"
                                                id="" value="{{ $wallet->date }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" id="" class="form-control" required>{{ $wallet->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mode</label>
                                            <select name="mode" id="" class="form-control" required>
                                                <option value="Wallet">Wallet</option>
                                                <option value="Wallet" {{ $wallet->mode == 'Wallet' ? 'selected' : '' }}>
                                                    Wallet
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">£</div>
                                                </div>
                                                <input type="number" step="0.1" name="amount"
                                                    class="form-control fee-total"
                                                    value="{{ auth()->user()->priceFormat($wallet->amount) }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('wallet.index') }}" class="btn btn-light">Cancel</a>
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
