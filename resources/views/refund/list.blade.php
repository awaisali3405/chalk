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
                                                    <th>Paid By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($refund as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value->invoice->student->name() }}
                                                            ({{ $value->invoice->receipt[0]->mode }})
                                                        </td>
                                                        <td>{{ $value->invoice->amount }}</td>
                                                        <td>
                                                            @if ($value->paid_by_cash)
                                                                Cash
                                                            @elseif ($value->paid_by_bank)
                                                                Bank
                                                            @endif
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
@endsection
