@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>About Student</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Students</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">About Student</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-xxl-4 col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="text-center p-3 overlay-box"
                                    style="background-image: url(images/big/img1.jpg);">
                                    <div class="profile-photo">
                                        <img src="{{ asset($student->profile_pic) }}" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white">{{ $student->first_name }} {{ $student->last_name }}
                                    </h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Roll
                                            No</span> <strong class="text-muted">{{ $student->id }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Year</span> <strong
                                            class="text-muted">{{ $student->currentYear()->name }}
                                        </strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Payment</span> <strong
                                            class="text-muted">{{ $student->payment_period }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Branch</span> <strong
                                            class="text-muted">{{ $student->branch->name }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Balance</span> <strong class="text-muted">0</strong></li>
                                </ul>

                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">about me</h2>
                                </div>
                                <div class="card-body pb-0">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Gender</strong>
                                            <span class="mb-0">Male</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Education</strong>
                                            <span class="mb-0">PHD</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Email</strong>
                                            <span class="mb-0">info@example.com</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Phone</strong>
                                            <span class="mb-0">+01 123 456 7890</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer pt-0 pb-0 text-center">
                                    <div class="row">
                                        <div class="col-4 pt-3 pb-3 border-right">
                                            <h3 class="mb-1 text-primary">150</h3>
                                            <span>Projects</span>
                                        </div>
                                        <div class="col-4 pt-3 pb-3 border-right">
                                            <h3 class="mb-1 text-primary">140</h3>
                                            <span>Uploads</span>
                                        </div>
                                        <div class="col-4 pt-3 pb-3">
                                            <h3 class="mb-1 text-primary">45</h3>
                                            <span>Tasks</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-block">
                                    <h4 class="card-title">Parent Login Detail </h4>
                                </div>

                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- @dd(str_contains('/attendance', url()->current())) --}}
                <div class="col-xl-9 col-xxl-8 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                                class="nav-link {{ str_contains(url()->current(), 'attendance') ? '' : 'active show' }} ">About
                                                Me</a></li>
                                        <li class="nav-item"><a href="#upload" data-toggle="tab" class="nav-link">Upload</a>
                                        </li>
                                        <li class="nav-item"><a href="#note" data-toggle="tab" class="nav-link">Notes</a>
                                        </li>
                                        <li class="nav-item"><a href="#attendance" data-toggle="tab"
                                                class="nav-link {{ str_contains(url()->current(), 'attendance') ? 'active show' : '' }}">Attendance</a>
                                        </li>
                                        <li class="nav-item"><a href="#statement" data-toggle="tab"
                                                class="nav-link">Statement</a></li>
                                        <li class="nav-item"><a href="#parent" data-toggle="tab" class="nav-link">Parent
                                                Detail</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me"
                                            class="tab-pane fade {{ str_contains(url()->current(), 'attendance') ? '' : 'active show' }}">
                                            <div class="profile-personal-info pt-4">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                            {{ $student->first_name }} {{ $student->last_name }}
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        <span>{{ $student->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Date Of Birth <span class="pull-right">:</span>

                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                                                            {{ $student->dob }}</span>
                                                    </div>
                                                </div>
                                                {{-- <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Location <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        <span>{{ $student->parents[0]->address }}</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="profile-skills pt-2 border-bottom-1 pb-2">
                                                <h4 class="text-primary mb-4">Subject</h4>
                                                @foreach ($student->enquirySubject as $value)
                                                    <a href="javascript:void()"
                                                        class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">{{ $value->subject->name }}</a>
                                                @endforeach

                                            </div>
                                            <div class="profile-lang pt-5 border-bottom-1 pb-5">
                                                <h4 class="text-primary mb-4">Language</h4><a href="javascript:void()"
                                                    class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-us"></i>
                                                    {{ $student->home_language }}</a>
                                            </div>
                                            {{-- <div class="profile-about-me">
                                                <div class="border-bottom-1 pb-4">
                                                    <p>A wonderful serenity has taken possession of my entire soul, like
                                                        these sweet mornings of spring which I enjoy with my whole heart. I
                                                        am alone, and feel the charm of existence was created for the bliss
                                                        of souls like mine.I am so happy, my dear friend, so absorbed in the
                                                        exquisite sense of mere tranquil existence, that I neglect my
                                                        talents.</p>
                                                    <p>A collection of textile samples lay spread out on the table - Samsa
                                                        was a travelling salesman - and above it there hung a picture that
                                                        he had recently cut out of an illustrated magazine and housed in a
                                                        nice, gilded frame.</p>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div id="upload" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="post-input">
                                                    <table id="example5" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr</th>
                                                                <th>Document</th>
                                                                <th>File</th>


                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($student->upload as $key => $value)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>

                                                                    <td>{{ $value->document_name }}</td>
                                                                    <td>{{ $value->file_name }}</td>


                                                                    <td>



                                                                        <a href="{{ asset($value->file) }}"
                                                                            title="" target="_blank"
                                                                            class="btn btn-sm btn-primary">Download</a>
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
                                        <div id="note" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="post-input">
                                                    {!! $student->note !!}
                                                </div>

                                            </div>
                                        </div>
                                        <div id="attendance"
                                            class="tab-pane fade {{ str_contains(url()->current(), 'attendance') ? 'active show' : '' }}">
                                            <div class="my-post-content pt-3">
                                                <div class="post-input">
                                                    <table id="example5" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>Date</th>
                                                                <th>Subject</th>
                                                                <th>Status</th>
                                                                <th>Note</th>


                                                                {{-- <th>Action</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($student->attendance as $key => $value)
                                                                <tr>
                                                                    <td>{{ $value->date }}</td>

                                                                    <td>{{ $value->enquirySubject->subject->name }}</td>
                                                                    <td>{{ $value->statusName() }}</td>
                                                                    <td>{{ $value->note }}</td>



                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="parent" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="post-input">

                                                    <div class="profile-personal-info pt-4">
                                                        @foreach ($student->parents as $value)
                                                            <h4 class="text-primary mb-4">{{ $value->relationship }}</h4>
                                                            <div class="row mb-4">
                                                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                                    <h5 class="f-w-500">Name <span
                                                                            class="pull-right">:</span>

                                                                    </h5>
                                                                </div>
                                                                <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                                                                        {{ $value->first_name }}
                                                                        {{ $value->last_name }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                                    <h5 class="f-w-500">Email <span
                                                                            class="pull-right">:</span>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                                    <span>{{ $value->email }}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-4">
                                                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                                    <h5 class="f-w-500">Location <span
                                                                            class="pull-right">:</span>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                                    <span>{{ $value->address() }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                                    <h5 class="f-w-500">Job <span
                                                                            class="pull-right">:</span>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                                    <span>{{ $value->occupation }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
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
