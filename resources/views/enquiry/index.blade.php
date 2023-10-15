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
                                                            <a href="{{ route('enquiry.edit', $value->id) }}" title="edit"
                                                                class="btn btn-sm btn-primary"><i
                                                                    class="la la-pencil"></i></a>
                                                            <a href="{{ route('enquiry.note', $value->id) }}" title="note"
                                                                class="btn btn-sm btn-secondary"><i
                                                                    class="la la-sticky-note"></i></a>
                                                            <a href="{{ route('enquiry.upload', $value->id) }}"
                                                                title="upload" class="btn btn-sm btn-info"><i
                                                                    class="la la-arrow-circle-up"></i></a>
                                                            <a href="{{ route('enquiry.register', $value->id) }}"
                                                                title="note" class="btn btn-sm btn-info"><i
                                                                    class="la la-registered"></i></a>
                                                            <a href="{{ route('enquiry.edit', $value->id) }}"
                                                                title="note" class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a>
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
