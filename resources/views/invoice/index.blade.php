@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Generate Invoice</h4>
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
                                        <img src="{{ asset('images/1.jpg') }}" width="100" height="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white">
                                    </h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Roll
                                            No</span> <strong class="text-muted"></strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Year</span> <strong class="text-muted">
                                        </strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Payment</span> <strong class="text-muted"></strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Branch</span> <strong class="text-muted"></strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Balance</span> <strong class="text-muted">0</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            #</span> <strong class="text-muted"></strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            Amount</span> <strong class="text-muted">£</strong></li>
                                </ul>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-block">
                                    <h4 class="card-title">Address </h4>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                {{-- <div class="card-header d-block">
                                    <h4 class="card-title">Parent Login Detail </h4>
                                </div> --}}
                                {{-- <div class="card-body">
                                    <h6>Photoshop
                                        <span class="pull-right">85%</span>
                                    </h6>
                                    <div class="progress ">
                                        <div class="progress-bar bg-danger progress-animated"
                                            style="width: 85%; height:6px;" role="progressbar">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                    <h6 class="mt-4">Code editor
                                        <span class="pull-right">90%</span>
                                    </h6>
                                    <div class="progress">
                                        <div class="progress-bar bg-info progress-animated" style="width: 90%; height:6px;"
                                            role="progressbar">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                    <h6 class="mt-4">Illustrator
                                        <span class="pull-right">65%</span>
                                    </h6>
                                    <div class="progress">
                                        <div class="progress-bar bg-success progress-animated"
                                            style="width: 65%; height:6px;" role="progressbar">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div> --}}
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
                                                class="nav-link active show">Individual Invoice</a></li>
                                        <li class="nav-item"><a href="#receipt-list" data-toggle="tab" class="nav-link ">All
                                                Invoice</a></li>
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
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-personal-info pt-4">
                                                {{-- <h4 class="text-primary mb-4">Personal Information</h4> --}}
                                                <form action="{{ route('invoice.store') }}" method="post">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Branch</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="branch" id="branch"
                                                                        class="form-control">
                                                                        @foreach ($branch as $value)
                                                                            <option value="{{ $value->id }}">
                                                                                {{ $value->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Key Stage</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="key_stage_id" id="keyStage"
                                                                        class="form-control">
                                                                        @foreach ($keyStage as $value)
                                                                            <option value="{{ $value->id }}">
                                                                                {{ $value->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Year</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="branch" id="year"
                                                                        class="form-control">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Discount</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        id="discount" name="discount_amount"
                                                                        value="0" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Late Fee Charge</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        id="late_fee" name="discount_amount"
                                                                        value="0" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Date</label>
                                                                <div class="input-group mb-2">
                                                                    {{-- <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div> --}}
                                                                    <input type="date" class="form-control"
                                                                        name="discount_amount" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Date</label>
                                                                <div class="input-group mb-2">
                                                                    {{-- <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div> --}}
                                                                    <input type="text" class="form-control"
                                                                        name="description" value="Amount Received By"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Mode</label>
                                                                <div class="input-group mb-2">
                                                                    {{-- <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div> --}}
                                                                    <select name="mode" id=""
                                                                        class="form-control">
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="Bank">Bank</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            <button type="submit" class="btn btn-light">Cencel</button>
                                                        </div>
                                                    </div>
                                                </form>
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

                                        <div id="receipt-list" class="tab-pane  ">
                                            <div class="profile-personal-info pt-4">
                                                <div class="table-responsive">
                                                    <table id="example5" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr</th>
                                                                <th>Receipt Date</th>
                                                                <th>Paid</th>
                                                                <th>Discount</th>
                                                                <th>Mode</th>

                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
