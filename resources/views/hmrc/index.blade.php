@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Staff HRMC</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <form action="{{ route('staff.hmrc') }}" class="" method="GET">
                                <div class="card " id="filter-form">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Branch</label>
                                                    <select name="branch_id" id="" class="form-control">
                                                        <option value="">All</option>
                                                        @foreach ($branch as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ $value->id == request()->input('branch_id') ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">From Date</label>
                                                    <input type="date" max="{{ auth()->user()->session()->end_date }}"
                                                        min="{{ auth()->user()->session()->start_date }}"
                                                        class="form-control" name="from_date"
                                                        max="{{ auth()->user()->session()->end_date }}"
                                                        min="{{ auth()->user()->session()->start_date }}"
                                                        value="{{ request()->input('from_date') }}">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">To Date</label>
                                                    <input type="date" max="{{ auth()->user()->session()->end_date }}"
                                                        min="{{ auth()->user()->session()->start_date }}"
                                                        class="form-control" name="to_date"
                                                        max="{{ auth()->user()->session()->end_date }}"
                                                        min="{{ auth()->user()->session()->start_date }}"
                                                        value="{{ request()->input('to_date') }}">
                                                </div>
                                            </div>


                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="input-group mb-2">
                                                        <select name="status" id="" class="form-control ">
                                                            <option value="paid">Paid</option>
                                                            <option value="un-paid">Un Paid</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-3  pt-4">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <button type="submit" class=" btn btn-primary">Show</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            @if (request()->input())
                                                                <a href="{{ route('staff.hmrc') }}"
                                                                    class="btn btn-secondary">Reset</a>
                                                            @else
                                                                <button type="reset"
                                                                    class=" btn btn-secondary">Reset</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <button type="reset" class=" btn btn-info">Print</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Staff HMRC </h4>
                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Discount</label>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date</label>
                                            <div class="input-group mb-2">
                                                <input type="date" max="{{ auth()->user()->session()->end_date }}"
                                                    min="{{ auth()->user()->session()->start_date }}" class="form-control"
                                                    name="date" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Paid</button>

                                    {{-- <a href="{{ route('board.create') }}" class="btn btn-primary">+ Add new</a> --}}
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Name</th>
                                                    <th>Payment</th>
                                                    <th>TAX</th>
                                                    <th>Student</th>
                                                    <th>Employee NI</th>
                                                    <th>Employee Pension</th>
                                                    <th>Net Pay</th>
                                                    <th>Employer NI</th>
                                                    <th>Employer Pension</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $payment = 0;
                                                    $tax = 0;
                                                    $studentLoan = 0;
                                                    $ni = 0;
                                                    $pension = 0;
                                                    $hmrc = 0;
                                                    $employerNI = 0;
                                                    $employerPension = 0;
                                                @endphp
                                                @foreach ($staff as $key => $value)
                                                    @php
                                                        $payment += $value->salary();
                                                        $tax += $value->tax();
                                                        $studentLoan += $value->studentLoan();
                                                        $ni += $value->empNI();
                                                        $pension += $value->empPension();
                                                        $hmrc += $value->hmrc();
                                                        $employerNI += $value->employerNI();
                                                        $employerPension += $value->employerPension();

                                                    @endphp
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->salary()) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->tax()) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->studentLoan()) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->empNI()) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->empPension()) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->hmrc()) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->employerNI()) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->employerPension()) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th>
                                                    </th>
                                                    <th>
                                                        Total
                                                    </th>
                                                    <th>£{{ auth()->user()->priceFormat($payment) }}</th>
                                                    <th>£{{ auth()->user()->priceFormat($tax) }}</th>
                                                    <th>£{{ auth()->user()->priceFormat($studentLoan) }}</th>
                                                    <th>£{{ auth()->user()->priceFormat($ni) }}</th>
                                                    <th>£{{ auth()->user()->priceFormat($pension) }}</th>
                                                    <th>£{{ auth()->user()->priceFormat($hmrc) }}</th>
                                                    <th>£{{ auth()->user()->priceFormat($employerNI) }}</th>
                                                    <th>£{{ auth()->user()->priceFormat($employerPension) }}</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    d
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
