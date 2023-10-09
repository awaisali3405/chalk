@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Staff</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Staff</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Staff</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center p-3 bg-white" style="">
                        <div class="profile-photo">
                            {{-- @dd($invoice) --}}
                            <img id="img" src="{{ asset($student->profile_pic) }}" width="100" height="100"
                                class="img-fluid rounded-circle" alt="">
                        </div>
                        <label for="upload" class="mt-3 mb-1 text-bold"> Name :{{ $student->first_name }}
                            {{ $student->last_name }} </label>
                    </div>
                </div>

            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Invoice </h4>
                                {{-- <a href="{{ route('board.create') }}" class="btn btn-primary">+ Add new</a> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example5" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Sr</th>
                                                <th>Invoice Date</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Period</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoice as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->created_at->toDateString() }}</td>
                                                    <td>{{ $value->type }}</td>
                                                    <td>{{ $value->amount }}</td>
                                                    <td>{{ $value->is_paid ? 'Paid' : 'Un Paid' }}</td>
                                                    <td>{{ $value->from_date }} - {{ $value->to_date }}</td>
                                                    <td>
                                                        <a href="{{ route('receipt.show', $value->id) }}"
                                                            class="btn btn-sm btn-primary">Recieve</a>
                                                        <a href="{{ route('board.edit', $value->id) }}"
                                                            class="btn btn-sm btn-primary">Print</a>
                                                        <a href="{{ route('board.edit', $value->id) }}"
                                                            class="btn btn-sm btn-primary">Delete</a>
                                                        {{-- <a href="{{ route('branch.show', $value->id) }}"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a> --}}
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
