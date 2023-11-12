@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('staff.attendance.store', $staff->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date</label>
                                            <input type="date" class="form-control" name="date"
                                                value="{{ \Carbon\Carbon::now()->toDateString() }}" id="" required>


                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Staff Time</label>
                                            <input type="time" class="form-control" name="start_time" value=""
                                                required id="">


                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">End Time</label>
                                            <input type="time" class="form-control" name="end_time" value=""
                                                required id="">


                                        </div>
                                    </div>
                                    @if ($staff->salary_type == 'Hourly')
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Paid Hours</label>
                                                <input type="number" class="form-control" name="paid_hour" value=""
                                                    required id="">


                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Rate</label>
                                                <input type="number" class="form-control" name="rate"
                                                    value="{{ $staff->salary }}" required id="">


                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('staff.index') }}" class="btn btn-light">Cencel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">

                    <div class="row tab-content">
                        <div id="all" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Date</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    @if ($staff->salary_type == 'Hourly')
                                                        <th>Paid Hour</th>
                                                        <th>Rate per Hour</th>
                                                        <th>Amount</th>
                                                    @endif

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staff->attendance as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                                        <td>{{ auth()->user()->timeFormat($value->start_time) }}</td>

                                                        <td>{{ auth()->user()->timeFormat($value->end_time) }}</td>
                                                        @if ($staff->salary_type == 'Hourly')
                                                            <td>{{ $value->paid_hour }}</td>
                                                            <td>{{ $value->rate }}</td>
                                                            <td>{{ $value->rate * $value->paid_hour }}</td>
                                                        @endif
                                                        <td>
                                                            {{-- <a href="{{ route('board.edit', $value->id) }}"
                                                                class="btn btn-sm btn-primary"><i
                                                                    class="la la-pencil"></i></a> --}}
                                                            <a class="btn-event btn btn-sm btn-primary" data-toggle="modal"
                                                                data-target="#attendance-{{ $value->id }}"><i
                                                                    class="fa fa-pencil"></i></a>
                                                            <a href="{{ route('staff.attendance.delete', $value->id) }}"
                                                                class="btn btn-primary"><i class="fa fa-trash"></i></a>
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
    @foreach ($staff->attendance as $value)
        @include('staff.attendance.modal.edit')
    @endforeach
@endsection
