@extends('layouts.app')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Refund</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Student</th>
                                                    <th>Amount</th>
                                                    <th>Dates</th>
                                                    <th>Paid By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($refund as $key => $value)
                                                    @if ($value->refundedAmount())
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $value->invoice->student->name() }}
                                                            </td>
                                                            <td>£{{ auth()->user()->priceFormat($value->amount) }}</td>
                                                            <td>
                                                                @foreach ($value->refunded as $value1)
                                                                    {{ auth()->user()->ukFormat($value1->date) . ' ' }}
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach ($value->refunded as $value1)
                                                                    {{ $value1->mode . ' ' }}
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif
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
