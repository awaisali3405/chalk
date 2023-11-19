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
                            <form action="{{ route('enquiry.index') }}" method="GET">
                                {{-- @csrf --}}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Branch</label>
                                                    <select name="branch_id" id="" class="form-control">

                                                        <option value="">All</option>
                                                        @foreach ($branch as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ $value->id == request()->input('branch_id') ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Academic Year</label>
                                                    <select name="academic_year_id" id="" class="form-control">

                                                        <option value="">All</option>
                                                        @foreach ($academicYear as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ $value->id == request()->input('academic_year_id') ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">From Date</label>
                                                    <input type="date" class="form-control" name="from_date"
                                                        value="{{ request()->input('from_date') }}">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">To Date</label>
                                                    <input type="date" class="form-control" name="to_date"
                                                        value="{{ request()->input('to_date') }}">
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Current School</label>
                                                    <select name="current_school" id="" class="form-control">

                                                        <option value="">All</option>
                                                        @foreach ($currentShool as $value)
                                                            <option value="{{ $value }}"
                                                                {{ $value == request()->input('current_school') ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">From Week</label>
                                                    <select name="from_week" id="" class="form-control">

                                                        <option value="">None</option>
                                                        @for ($i = 1; $i < 53; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ $i == request()->input('from_week') ? 'selected' : '' }}>
                                                                Week {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">To Week</label>
                                                    <select name="to_week" id="" class="form-control">

                                                        <option value="">None</option>
                                                        @for ($i = 1; $i < 53; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ $i == request()->input('to_week') ? 'selected' : '' }}>
                                                                Week {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center pt-2">
                                                <div class="form-group">

                                                    <button type="submit" class=" btn btn-primary">Show</button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                            </form>
                        </div>
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
                                                <th>Name</th>
                                                <th>Year</th>
                                                <th>Date</th>
                                                <th>Week</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($enquiry as $key => $value)
                                                {{-- @dd($value->caller_name) --}}
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $value->caller_name }}</td>
                                                    <td>{{ $value->name() }}</td>
                                                    <td>{{ $value->year->name }}</td>
                                                    <td>{{ auth()->user()->ukFormat($value->enquiry_date) }}</td>
                                                    <td>Week
                                                        {{-- @dd(
                                                            auth()->user()->session()->start_date,
                                                            $value->$value->enquriy_date
                                                        ) --}}
                                                        {{ auth()->user()->week($value->enquiry_date) }}
                                                        {{-- {{ \Carbon\Carbon::parse(auth()->user()->session()->start_date)->diffInWeeks(\Carbon\Carbon::parse($value->$value->enquiry_date)) }} --}}
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
                                                            @if (!$value->student)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiry.register', $value->id) }}">Register</a>
                                                                {{-- <a class="dropdown-item"
                                                                href="{{ route('enquiry.delete', $value->id) }}">Delete</a> --}}

                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="event.preventDefault(); document.getElementById('delete').submit();">
                                                                    Delete
                                                                </a>
                                                            @endif
                                                            <form method="POST" id="delete"
                                                                action="{{ route('enquiry.destroy', $value->id) }}">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">

                                                            </form>
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
@endsection
