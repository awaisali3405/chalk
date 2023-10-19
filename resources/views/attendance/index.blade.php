@extends('layouts.app')
@section('content')
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
                <form action="{{ route('attendance.index') }}" method="get">
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
                        {{-- @dd(session('key_stage_id')) --}}
                        {{-- <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Key Stage</label>
                                <div class="input-group mb-2">
                                    <select name="key_stage_id" id="year" class="form-control keyStage" required> --}}
                        {{-- <option value="0">All</option> --}}
                        {{-- @foreach ($keyStage as $value)
                                            <option value="{{ $value->id }}"
                                                {{ request()->get('key_stage_id') == $value->id ? 'selected' : '' }}>
                                                {{ $value->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div> --}}
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
                        {{-- <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Subject</label>
                                <div class="input-group mb-2">
                                    <select name="subject_id" class="form-control subject" required>


                                    </select>
                                </div>
                            </div>
                        </div> --}}


                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">From Date</label>
                                <div class="input-group mb-2">
                                    <input type="date" class="form-control" id="" name="from_date"
                                        placeholder="" value="{{ request()->get('from_date') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">To Date</label>
                                <div class="input-group mb-2">
                                    <input type="date" class="form-control" id="" name="to_date" placeholder=""
                                        value="{{ request()->get('to_date') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 pt-4">
                            <button type="submit" class="btn btn-primary">Apply</button>
                            {{-- <button type="submit" class="btn btn-light">Cencel</button> --}}
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
                                            <table id="example5" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        {{-- <th><input type="checkbox" name="" id="check_all">
                                                        </th> --}}
                                                        <th>Roll</th>
                                                        <th>Name</th>
                                                        <th>Present</th>
                                                        <th>Absent</th>
                                                        <th>Unathorized</th>
                                                        <th>Additional Class</th>
                                                        <th>Cover Up</th>
                                                        <th>Detail</th>
                                                        {{-- <th>Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @dd($student) --}}
                                                    @foreach ($student as $key => $value)
                                                        <tr>
                                                            <td>{{ $value->id }}</td>
                                                            <td>{{ $value->first_name }}</td>
                                                            <td>{{ $value->totalAttendance(request()->get('from_date'), request()->get('to_date'))->where('status', 1)->count() }}
                                                            </td>
                                                            <td>{{ $value->totalAttendance(request()->get('from_date'), request()->get('to_date'))->where('status', 2)->count() }}
                                                            </td>
                                                            <td>{{ $value->totalAttendance(request()->get('from_date'), request()->get('to_date'))->where('status', 3)->count() }}
                                                            </td>
                                                            <td>{{ $value->totalAttendance(request()->get('from_date'), request()->get('to_date'))->where('status', 4)->count() }}
                                                            </td>
                                                            <td>{{ $value->totalAttendance(request()->get('from_date'), request()->get('to_date'))->where('status', 5)->count() }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('attendance.student.detail', $value->id) }}"
                                                                    class="btn btn-primary">Detail</a>
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
            </form>


        </div>
    </div>
@endsection
