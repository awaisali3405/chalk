@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Academic Calender</h4>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Academic Calender </h4>
                                    <a href="{{ route('academicCalender.create') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Session</th>
                                                    <th>Week</th>
                                                    <th>Status</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($academicCalender as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>

                                                        <td>{{ $value->start_date }} - {{ $value->end_date }}</td>
                                                        <td>Week
                                                            {{ \Carbon\Carbon::parse($value->start_date)->diffInWeeks(\Carbon\Carbon::parse($value->end_date)->addDay(1)) }}
                                                        </td>
                                                        <td>{{ $value->active ? 'Active' : 'De Active' }}</td>
                                                        <td>
                                                            <a href="{{ route('academicCalender.edit', $value->id) }}"
                                                                class="btn btn-sm btn-primary"><i
                                                                    class="la la-pencil"></i></a>
                                                            @if (!$value->active)
                                                                <a href="{{ route('academicCalender.show', $value->id) }}"
                                                                    class="btn btn-sm btn-primary"> Active</a>
                                                            @endif
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
