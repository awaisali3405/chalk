@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Student</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Student </h4>
                                    <a href="{{ route('student.create') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Roll</th>
                                                    <th>Name</th>
                                                    <th>Year</th>
                                                    <th>Date</th>
                                                    <th>Week</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @forelse ( as )

                                                @empty --}}


                                                @forelse ($student as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>

                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->first_name }} {{ $value->last_name }} </td>
                                                        <td>{{ $value->year->name }}</td>
                                                        <td>{{ $value->admission_date }}</td>
                                                        <td>Week
                                                            {{ \Carbon\Carbon::parse(auth()->user()->session()->start_date)->diffInWeeks(\Carbon\Carbon::parse($value->admission_date)->addDay(1)) }}
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="true">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" x-placement="bottom-start"
                                                                style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('student.edit', $value->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('student.note', $value->id) }}">Note</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('student.upload', $value->id) }}">Upload</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('student.show', $value->id) }}">Show</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('invoice.show', $value->id) }}">Invoice</a>
                                                            </div>
                                                            {{-- <a href="{{ route('student.edit', $value->id) }}"
                                                                title="edit" class="btn btn-sm btn-primary"><i
                                                                    class="la la-pencil"></i></a>
                                                            <a href="{{ route('student.note', $value->id) }}"
                                                                title="note" class="btn btn-sm btn-secondary"><i
                                                                    class="la la-sticky-note"></i></a>
                                                            <a href="{{ route('student.upload', $value->id) }}"
                                                                title="upload" class="btn btn-sm btn-info"><i
                                                                    class="la la-arrow-circle-up"></i></a>
                                                            <a href="{{ route('student.show', $value->id) }}"
                                                                title="upload" class="btn btn-sm btn-info"><i
                                                                    class="la la-eye"></i></a>
                                                            <a href="{{ route('invoice.show', $value->id) }}"
                                                                title="upload" class="btn btn-sm btn-info">Invoice</a> --}}


                                                            {{-- <a href="{{ route('student.destory', $value->id) }}"
                                                                title="note" class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a> --}}
                                                            {{-- <a href="{{ route('branch.show', $value->id) }}"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a> --}}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6">No data</td>
                                                    </tr>
                                                @endforelse
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
