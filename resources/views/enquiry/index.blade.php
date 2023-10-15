@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Enquiry</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Enquiry </h4>
                                    <a href="{{ route('enquiry.create') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Caller</th>
                                                    <th>Year</th>
                                                    <th>Section</th>
                                                    <th>Date</th>
                                                    <th>Week</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($enquiry as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>

                                                        <td>{{ $value->caller_name }}</td>
                                                        <td>{{ $value->year->name }}</td>
                                                        <td>{{ $value->keyStage->name }}</td>
                                                        <td>{{ $value->enquiry_date }}</td>
                                                        <td>Week
                                                            {{ \Carbon\Carbon::parse(auth()->user()->session()->start_date)->diffInWeeks(\Carbon\Carbon::parse($value->enquriy)->addDay(1)) }}
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="true">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" x-placement="bottom-start"
                                                                style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiry.edit', $value->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiry.note', $value->id) }}">Note</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiry.upload', $value->id) }}">Upload</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiry.register', $value->id) }}">Register</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiry.edit', $value->id) }}">Delete</a>
                                                            </div>
                                                            {{-- <a title="edit" class="btn btn-sm btn-primary"><i
                                                                    class="la la-pencil"></i></a>
                                                            <a title="note" class="btn btn-sm btn-secondary"><i
                                                                    class="la la-sticky-note"></i></a>
                                                            <a title="upload" class="btn btn-sm btn-info"><i
                                                                    class="la la-arrow-circle-up"></i></a>
                                                            <a title="note" class="btn btn-sm btn-info"><i
                                                                    class="la la-registered"></i></a>
                                                            <a href="{{ route('enquiry.edit', $value->id) }}"
                                                                title="note" class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a> --}}
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
