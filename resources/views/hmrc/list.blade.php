@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All HMRC Report</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All HMRC Report </h4>
                                    <a href="{{ route('staff.hmrc') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Branch</th>
                                                    <th>Supplier</th>
                                                    <th>Amount</th>
                                                    <th>NIC Emp Allowance</th>
                                                    <th>Net Paid</th>
                                                    <th>Date</th>
                                                    <th>Period</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hmrc as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>

                                                        <td>{{ $value->payment_type == 'gov' ? 'HMRC' : 'Pension' }}</td>
                                                        <td>{{ $value->branch->name }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->amount) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->discount) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->amount - $value->discount) }}
                                                        </td>
                                                        <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                                        <td>{{ $value->period() }}</td>

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
@endsection
