@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Loan</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Loan </h4>
                                    <a href="{{ route('loan.create') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Staff Name</th>
                                                    <th>Branch</th>
                                                    <th>Deparment</th>
                                                    <th>Amount</th>
                                                    <th>Paid</th>
                                                    <th>Remaining</th>


                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($loan as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value->staff->name }}</td>
                                                        <td>{{ $value->branch->name }}</td>
                                                        <td>{{ $value->staff->department->name }}</td>
                                                        <td>{{ $value->amount }}</td>
                                                        <td>{{ $value->paid() }}</td>
                                                        <td>{{ $value->remaining() }}</td>


                                                        <td></td>
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
