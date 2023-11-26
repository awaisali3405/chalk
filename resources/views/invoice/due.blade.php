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

                                        {{-- <button type="submit" class="btn btn-light">Cencel</button> --}}
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
                                                                    <th>Sr</th>
                                                                    <th>Invoice Date</th>
                                                                    <th>Type</th>
                                                                    <th>Student</th>
                                                                    <th>Payable</th>
                                                                    <th>Status</th>
                                                                    <th>Period</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            @php
                                                                $total = 0;
                                                                $total_paid = 0;
                                                                $total_remaining = 0;
                                                            @endphp
                                                            <tbody>
                                                                @foreach ($invoice as $key => $value)
                                                                    @php
                                                                        $total += $value->amount;
                                                                        // dd($value->);
                                                                        $total_paid += $value->receipt->sum('amount');
                                                                        $total_remaining += $value->amount - ($value->receipt->sum('discount') - $value->receipt->sum('late_fee')) - $value->receipt->sum('amount');
                                                                    @endphp
                                                                    <tr>
                                                                        <td>{{ $key + 1 }}</td>
                                                                        <td>{{ auth()->user()->ukFormat($value->created_at) }}
                                                                        </td>
                                                                        <td>{{ $value->type == 'Refundable' ? 'Deposit' : $value->type }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $value->student->name() }}
                                                                        </td>
                                                                        <td>£{{ $value->amount - ($value->receipt->sum('discount') - $value->receipt->sum('late_fee')) - $value->receipt->sum('amount') }}
                                                                        </td>
                                                                        <td>{{ $value->is_paid ? 'Paid' : 'Unpaid' }}</td>
                                                                        <td>{{ $value->from_date }} -
                                                                            {{ $value->to_date }}</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                class="btn btn-primary dropdown-toggle"
                                                                                data-toggle="dropdown" aria-expanded="true">
                                                                                Action
                                                                            </button>
                                                                            <div class="dropdown-menu"
                                                                                x-placement="bottom-start"
                                                                                style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                                                                                @if (auth()->user()->role->name == 'parent')
                                                                                    <a class="dropdown-item btn-event"
                                                                                        href="{{ route('invoice.print', $value->id) }}"
                                                                                        data-toggle="modal"
                                                                                        data-target="#print-{{ $value->id }}">Print</a>
                                                                                @else
                                                                                    @if (!$value->is_paid)
                                                                                        <a class="dropdown-item"
                                                                                            href="{{ route('receipt.show', $value->id) }}">Recieve</a>
                                                                                    @endif
                                                                                    <a class="dropdown-item btn-event"
                                                                                        href="{{ route('invoice.print', $value->id) }}"
                                                                                        data-toggle="modal"
                                                                                        data-target="#print-{{ $value->id }}">Print</a>

                                                                                    <!-- Trigger the modal with a button -->
                                                                                    @if (!$value->is_paid && count($value->receipt) == 0)
                                                                                        <form
                                                                                            action="{{ route('invoice.destroy', $value->id) }}"
                                                                                            id="myForm" method="POST">
                                                                                            @csrf
                                                                                            @method('delete')
                                                                                            <span
                                                                                                onclick="document.getElementById('myForm').submit();"
                                                                                                class="dropdown-item">Delete</span>
                                                                                        </form>
                                                                                    @endif
                                                                                @endif


                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                @endforeach


                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>

                                                                    <th>£{{ $total_remaining }}</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>

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
