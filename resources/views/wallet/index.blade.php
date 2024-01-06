@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Wallet List</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Wallet </h4>
                                    <a href="{{ route('wallet.create') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Date</th>
                                                    <th>Branch</th>
                                                    <th>Year</th>
                                                    <th>Student Name</th>
                                                    <th>Amount</th>
                                                    <th>Mode</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($wallet as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                                        <td>{{ $value->branch->name }}</td>
                                                        <td>{{ $value->year->name }}</td>
                                                        <td>{{ $value->student->name() }}</td>
                                                        <td>{{ auth()->user()->priceFormat($value->amount) }}</td>
                                                        <td>{{ $value->mode }}</td>
                                                        <td>
                                                            @if (!$value->fixed)
                                                                <button type="button"
                                                                    class="btn btn-primary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="true">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu" x-placement="bottom-start"
                                                                    style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px); height:150px; overflow:auto;">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('wallet.edit', $value->id) }}">Edit</a>

                                                                </div>
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
