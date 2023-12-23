@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <form action="{{ route('staffAttendance.store') }}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"></h5>
                            </div>
                            <div class="card-body">

                                @csrf
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date</label>
                                            <input type="date" max="{{ auth()->user()->session()->end_date }}"
                                                min="{{ auth()->user()->session()->start_date }}" class="form-control"
                                                name="date" value="{{ \Carbon\Carbon::now()->toDateString() }}"
                                                id="" required>


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

                                    <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center d-flex">
                                        <div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        <a href="{{ route('staff.index') }}" class="btn btn-light">Cancel</a>
                                    </div>
                                </div>

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
                                            <table id="example5" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" name="" id="check_all">
                                                        </th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Branch</th>
                                                        <th>Invoice</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($staff as $key => $value)
                                                        <tr>
                                                            <td><input type="checkbox" name="teacher[]"
                                                                    value="{{ $value->id }}" id=""
                                                                    class="checkbox">
                                                            </td>
                                                            <td>{{ $value->name }}
                                                            </td>
                                                            <td>{{ $value->email }}</td>
                                                            <td>{{ $value->teacherEnquiry->branch->name }}
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('staff.attendance.index', $value->id) }}">Invoice</a>
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
