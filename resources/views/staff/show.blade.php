@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Profile</h4>
                    </div>
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
                                        <img src="{{ asset($staff->teacherEnquiry->pic) }}" width="100px" height="100px"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white">{{ $staff->name }}
                                    </h3>
                                </div>
                                <ul class="list-group list-group-flush">


                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Payment</span> <strong
                                            class="text-muted">{{ $staff->salary_type }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Branch</span> <strong
                                            class="text-muted">{{ $staff->branch->name }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Staff
                                            {{ $staff->salary_type }}
                                            Salary</span> <strong class="text-muted">£ {{ $staff->salary }}</strong></li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                                class="nav-link active show">About Me</a></li>
                                        <li class="nav-item"><a href="#receipt-list" data-toggle="tab" class="nav-link ">Pay
                                                List</a></li>
                                        <li class="nav-item"><a href="#attendance-list" data-toggle="tab"
                                                class="nav-link ">Attendance List</a></li>
                                        <li class="nav-item"><a href="#upload-list" data-toggle="tab"
                                                class="nav-link ">Upload List</a></li>
                                        {{-- <li class="nav-item"><a href="#upload" data-toggle="tab" class="nav-link">Upload</a>
                                        </li>
                                        <li class="nav-item"><a href="#note" data-toggle="tab" class="nav-link">Notes</a>
                                        </li>
                                        <li class="nav-item"><a href="#attandence" data-toggle="tab"
                                                class="nav-link">Attendance</a></li>
                                        <li class="nav-item"><a href="#statement" data-toggle="tab"
                                                class="nav-link">Statement</a></li>
                                        <li class="nav-item"><a href="#parent" data-toggle="tab" class="nav-link">Parent
                                                Detail</a></li> --}}
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show pt-3">

                                        </div>

                                        <div id="receipt-list" class="tab-pane  ">
                                            <div class="profile-personal-info pt-4">
                                                <div class="table-responsive">
                                                    <table id="example5" class="display">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr</th>
                                                                <th>Pay Date</th>
                                                                <th>Salary</th>
                                                                <th>Deduction</th>
                                                                <th>Total</th>
                                                                <th>Mode</th>

                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($staff->receipt as $key => $value)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                                                    <td>{{ $value->salary }}</td>
                                                                    <td>{{ $value->deduction }}</td>
                                                                    <td>{{ $value->total }}</td>
                                                                    <td>{{ $value->mode }}</td>
                                                                    <td><a href="" class="btn btn-primary">Print</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                        <div id="attendance-list" class="tab-pane  ">
                                            <div class="profile-personal-info pt-4">
                                                <div class="table-responsive">
                                                    <table id="example5" class="display">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr</th>
                                                                <th>Date</th>
                                                                <th>Period</th>
                                                                <th>Amount</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($staff->attendance as $key => $value)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                                                    <td>{{ $value->period() }}</td>
                                                                    <td>{{ $value->amount() }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{-- <h4 class="text-primary mb-4">Personal Information</h4> --}}
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

                                        </div>
                                        <div id="upload-list" class="tab-pane  ">
                                            <div class="profile-personal-info pt-4">
                                                <div class="table-responsive">
                                                    <table id="example5" class="display">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr</th>
                                                                <th>Document Name</th>
                                                                <th>File Name</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($staff->teacherEnquiry->upload as $key => $value)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $value->document_name }}</td>
                                                                    <td><a href="{{ asset($value->file_name) }}"
                                                                            target="_blank" rel="noopener noreferrer">
                                                                            {{ $value->file_name }}</td>
                                                                    </a>
                                                                    <td>{{ auth()->user()->ukFormat($value->date) }}</td>
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

            </div>
        </div>
    @endsection
