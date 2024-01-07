@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Staff DBS Request</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Staff DBS Request </h4>
                                    <a href="{{ route('staffRequest.create') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Name</th>
                                                    <th>Deduction Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staffRequest as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value->staff->name }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->deduction_amount) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->request_amount) }}</td>
                                                        <td>
                                                            @if (!$value->fixed)
                                                                <a href="{{ route('staffRequest.edit', $value->id) }}"
                                                                    class="btn btn-sm btn-primary"><i
                                                                        class="la la-pencil"></i></a>
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
