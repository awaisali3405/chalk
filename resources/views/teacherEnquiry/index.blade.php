@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Teacher Enquiry </h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Teacher Enquiry</h4>
                                    <a href="{{ route('enquiryTeacher.create') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Branch</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Email</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($enquiry as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>

                                                        <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                                                        <td>{{ $value->designation }}</td>
                                                        <td>{{ $value->branch->name }}</td>
                                                        <td>{{ $value->phone }}</td>
                                                        <td>{{ $value->address }}</td>
                                                        <td>{{ $value->email }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="true">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" x-placement="bottom-start"
                                                                style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                                                                @if ($value->staff)
                                                                @endif
                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiryTeacher.edit', $value->id) }}">Edit</a>
                                                                <a class="dropdown-item btn-event" data-toggle="modal"
                                                                    data-target="#notification-{{ $value->id }}">Notification</a>
                                                                <a class="dropdown-item btn-event" data-toggle="modal"
                                                                    data-target="#registration-{{ $value->id }}">Registration</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiryTeacher.upload', $value->id) }}">Document</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiryTeacher.upload', $value->id) }}">Upload</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiryTeacher.note', $value->id) }}">Note</a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('enquiryTeacher.destroy', $value->id) }}">Delete</a>
                                                            </div>
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
    @foreach ($enquiry as $key => $value)
        @include('teacherEnquiry.modal.index')
        @include('teacherEnquiry.modal.registration')
    @endforeach
@endsection
