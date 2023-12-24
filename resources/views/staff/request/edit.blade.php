@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Branch</h4>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Branch</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('staffRequest.update', $staffRequest->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                {{-- @dd($staffRequest) --}}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Branch</label>
                                            <select name="branch_id" id="" required>
                                                <option value="">-</option>
                                                @foreach ($branch as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == $staffRequest->branch_id ? 'selected' : '' }}>
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Staff</label>
                                            <select name="staff_id" id="" required>
                                                <option value="">-</option>
                                                @foreach ($staff as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $staffRequest->staff_id == $value->id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Given Amount</label>
                                            <input type="number" class="form-control" name="request_amount" required
                                                value="{{ $staffRequest->reqeest_amount }}" step="0.01">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Deduction Amount</label>
                                            <input type="number" class="form-control"
                                                value="{{ $staffRequest->deduction_amount }}" name="deduction_amount"
                                                step="0.01" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date</label>
                                            <input type="date" max="{{ auth()->user()->session()->end_date }}"
                                                name="date" min="{{ auth()->user()->session()->start_date }}"
                                                value="{{ $staffRequest->date }}" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="submit" class="btn btn-light">Cancel</button>
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
