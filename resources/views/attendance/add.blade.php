@extends('layouts.app')
@section('content')
    @foreach ($student as $key => $value)
        @include('attendance.modal.detail')
    @endforeach
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Attendance</h4>
                    </div>
                </div>

            </div>

            <div class="profile-personal-info pt-4">
                <form action="{{ route('attendance.create') }}" method="get">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Branch</label>
                                <div class="input-group mb-2">
                                    <select name="branch" id="branch_id" class="form-control">
                                        <option value="">All</option>
                                        @foreach ($branch as $value)
                                            <option value="{{ $value->id }}"
                                                {{ request()->get('branch_id') == $value->id ? 'selected' : '' }}>
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Year</label>
                                <div class="input-group mb-2">
                                    <select name="year_id" class="form-control year">
                                        <option value="">All</option>
                                        @foreach ($year as $value)
                                            <option value={{ $value->id }}
                                                {{ request()->get('year_id') == $value->id ? 'selected' : '' }}>
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Date</label>
                                <div class="input-group mb-2">
                                    <input type="date" class="form-control" id="" name="date" placeholder=""
                                        value="{{ request()->get('date') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 pt-4">
                            <button type="submit" class="btn btn-primary">Apply</button>
                            {{-- <button type="submit" class="btn btn-light">Cancel</button> --}}
                        </div>
                    </div>
                </form>

            </div>
            <form action="{{ route('attendance.store') }}" method="post">
                @csrf
                <input type="hidden" name="date" value="{{ request()->get('date') }}" required>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row tab-content">
                            <div id="list-view" class="tab-pane fade active show col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Student </h4>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example5" class="display">
                                                <thead>
                                                    <tr>
                                                        {{-- <th><input type="checkbox" name="" id="check_all">
                                                        </th> --}}
                                                        <th style="width: 3%">Roll</th>
                                                        <th style="width: 10%">Name</th>
                                                        <th style="width: 10%">Subject</th>
                                                        <th style="width: 20%">Action</th>
                                                        <th style="width: 30%">Note</th>
                                                        <th>Detail</th>
                                                        {{-- <th>Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @dd($student) --}}
                                                    @foreach ($student as $key => $value)
                                                        @if (count($value->yearSubject) > 0)
                                                            <input type="hidden" name="student[]"
                                                                value="{{ $value->id }}">
                                                        @endif
                                                        @foreach ($value->yearSubject as $key2 => $value1)
                                                            <tr>
                                                                @if ($key2 == 0)
                                                                    <td rowspan="{{ count($value->yearSubject) }}">
                                                                        {{ $value->id }}</td>

                                                                    <td rowspan="{{ count($value->yearSubject) }}">
                                                                        {{ $value->first_name }}</td>
                                                                @endif

                                                                <td>{{ $value1->subject->name }}</td>
                                                                <td>

                                                                    <input type="hidden"
                                                                        name="subject_id[{{ $value->id }}][]"
                                                                        value="{{ $value1->id }}">
                                                                    <div class="row pt-4">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <select
                                                                                    name="status[{{ $value->id }}][{{ $value1->id }}]"
                                                                                    id="" class="form-control">
                                                                                    <option value="">-</option>
                                                                                    <option value="1"
                                                                                        {{ $value->attendanceStatus($value1->id, request()->get('date')) == 1 ? 'selected' : '' }}>
                                                                                        Present</option>
                                                                                    <option value="2"
                                                                                        {{ $value->attendanceStatus($value1->id, request()->get('date')) == 2 ? 'selected' : '' }}>
                                                                                        Authorised</option>
                                                                                    <option value="3"
                                                                                        {{ $value->attendanceStatus($value1->id, request()->get('date')) == 3 ? 'selected' : '' }}>
                                                                                        Unautorised
                                                                                    </option>
                                                                                    <option value="4"
                                                                                        {{ $value->attendanceStatus($value1->id, request()->get('date')) == 4 ? 'selected' : '' }}>
                                                                                        Additional Class
                                                                                    </option>
                                                                                    <option value="5"
                                                                                        {{ $value->attendanceStatus($value1->id, request()->get('date')) == 5 ? 'selected' : '' }}>
                                                                                        Cover Up</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <input type="text"
                                                                        name="note[{{ $value->id }}][{{ $value1->id }}]"
                                                                        value="{{ $value->attendanceNote($value1->id, request()->get('date')) }}"
                                                                        id="">
                                                                </td>
                                                                <td>
                                                                    <span class="btn btn-primary" data-toggle="modal"
                                                                        data-target="#attendance-{{ $value->id }}">Detail</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
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
            </form>
        </div>
    </div>
@endsection
