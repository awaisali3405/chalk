@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Invoice</h4>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">All Invoice</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('invoice.create') }}" method="GET">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Branch</label>
                                            <div class="input-group mb-2">
                                                <select name="branch_id" id="branch_id" class="form-control">
                                                    <option value="0">All</option>
                                                    @foreach ($branch as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ request()->branch_id == $value->id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Year</label>
                                            <div class="input-group mb-2">
                                                <select name="year_id" id="year" class="form-control">
                                                    <option value="0">All</option>
                                                    @foreach ($year as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ request()->year_id == $value->id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Payment</label>
                                            <div class="input-group mb-2">
                                                <select name="payment_period" id="" class="form-control payment">
                                                    {{-- <option value="0">All</option> --}}
                                                    <option value="Weekly"
                                                        {{ request()->payment_period == 'Weekly' ? 'selected' : '' }}>
                                                        Weekly</option>
                                                    <option value="Monthly"
                                                        {{ request()->payment_period == 'Monthly' ? 'selected' : '' }}>
                                                        Monthly</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-4 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <div class="input-group mb-2">
                                                <select name="status" id="" class="form-control payment">
                                                    <option value="0">All</option>
                                                    <option value="paid"
                                                        {{ request()->status == 'paid' ? 'selected' : '' }}>
                                                        Due Student</option>
                                                    <option value="un-paid"
                                                        {{ request()->status == 'un-paid' ? 'selected' : '' }}>
                                                        Fully Paid Student </option>

                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}




                                    <div class="col-lg-12 col-md-6 col-sm-12 pt-4 justify-content-center d-flex pb-4">
                                        <button type="submit" class="btn btn-primary">Show</button>

                                        {{-- <button type="submit" class="btn btn-light">Cancel</button> --}}
                                    </div>

                                </div>
                            </form>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row tab-content">
                                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Student </h4>

                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="example5" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>#
                                                                    </th>
                                                                    <th>Roll</th>
                                                                    <th>Name</th>
                                                                    <th>Year</th>
                                                                    <th>Branch</th>
                                                                    <th>Total Amount</th>
                                                                    <th>Paid</th>
                                                                    <th>Due</th>
                                                                    <th>Invoice</th>
                                                                    {{-- <th>Action</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($student as $key => $value)
                                                                    <tr>
                                                                        <td>{{ $key + 1 }}
                                                                        </td>
                                                                        <td>{{ $value->roll_no }}
                                                                        </td>
                                                                        <td>{{ $value->first_name }}
                                                                            {{ $value->last_name }}
                                                                        </td>
                                                                        <td>{{ $value->year->name }}
                                                                        </td>
                                                                        <td>{{ $value->branch->name }}
                                                                        </td>
                                                                        <td>£{{ $value->totalAmount() }}
                                                                        <td>£{{ $value->paid() }}
                                                                        <td>£{{ $value->due() }}
                                                                        </td>
                                                                        <td>
                                                                            <a class="btn btn-primary"
                                                                                href="{{ route('invoice.show', $value->id) }}">Invoice</a>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
