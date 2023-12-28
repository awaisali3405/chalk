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
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Sale</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Sale</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-xxl-4 col-lg-4 " id="profile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="text-center p-3 overlay-box"
                                    style="background-image: url(images/big/img1.jpg);">
                                    <div class="profile-photo">
                                        <img src="{{ asset($sale->student->profile_pic) }}" width="100" height="100"
                                            id="p_image" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white" id="p_name">
                                    </h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Roll
                                            No</span> <strong class="text-muted"
                                            id="p_roll">{{ $sale->student->id }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Year</span> <strong id="p_year"
                                            class="text-muted">{{ $sale->student->year->name }}
                                        </strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Payment</span> <strong id="payment"
                                            class="text-muted">{{ $sale->student->payment_period }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Branch</span> <strong id="p_branch"
                                            class="text-muted">{{ $sale->student->branch->name }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Balance</span> <strong class="text-muted">0</strong></li>

                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            Amount</span> <strong class="text-muted">£</strong></li>
                                </ul>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8 col-lg-8" id="widget">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        {{-- <li class="nav-item"><a href="#about-me" data-toggle="tab" id=""
                                                class="nav-link active show individual">Individual Invoice</a></li> --}}
                                        {{-- <li class="nav-item"><a href="#additional" data-toggle="tab"
                                                class="nav-link active show individual">Additional
                                                Invoice</a></li>
                                        <li class="nav-item"><a href="#receipt-list" data-toggle="tab"
                                                class="nav-link general ">All
                                                Invoice</a></li> --}}
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





                                        <div id="receipt-list" class="tab-pane fade show active">
                                            <div class="profile-personal-info pt-4">
                                                <form action="{{ route('sale.update', $sale->id) }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Branch</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="branch_id" id="branch_id"
                                                                        class="form-control">
                                                                        <option value="0">Selected Branch</option>
                                                                        @foreach ($branch as $value)
                                                                            <option value="{{ $value->id }}"
                                                                                {{ $sale->branch_id == $value->id ? 'selected' : '' }}>
                                                                                {{ $value->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Key Stage</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="key_stage_id"
                                                                        class="form-control keyStage">
                                                                        <option value="">-</option>
                                                                        @foreach ($keyStage as $value)
                                                                            <option value="{{ $value->id }}"
                                                                                {{ $sale->branch_id == $value->id ? 'selected' : '' }}>
                                                                                {{ $value->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Year</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="year_id"
                                                                        class="form-control year_student">
                                                                        <option value="{{ $sale->year_id }}">
                                                                            {{ $sale->year->name }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Student</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="student_id" class="form-control student">
                                                                        <option value="{{ $sale->student_id }}">
                                                                            {{ $sale->student->name }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Date</label>
                                                                <div class="input-group mb-2">
                                                                    <input type="date"
                                                                        max="{{ auth()->user()->session()->end_date }}"
                                                                        min="{{ auth()->user()->session()->start_date }}"
                                                                        class="form-control" id="discount"
                                                                        name="date" placeholder=""
                                                                        value="{{ $sale->date }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="subject-resource">
                                                            @foreach ($sale->product as $value)
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Resource</label>
                                                                            <div class="input-group mb-2">
                                                                                <select name="product_id[]"
                                                                                    class="form-control subject">


                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Quantiy</label>
                                                                            <div class="input-group mb-2">
                                                                                <input type="text" name="quantity[]"
                                                                                    class="form-control quantity">


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Rate</label>
                                                                            <div class="input-group mb-2">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">£</div>
                                                                                </div>
                                                                                <input name="rate[]"
                                                                                    class="form-control rate">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-3 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Amount</label>
                                                                            <div class="input-group mb-2">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">£</div>
                                                                                </div>
                                                                                <input name="amount[]"
                                                                                    class="form-control amount">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-3 col-sm-12 pt-4">
                                                                        <div class="form-group">
                                                                            <span
                                                                                class="add-resource btn btn-primary">+</span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <div class="col-lg-12 col-md-6 col-sm-12 pt-4">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            <a href="{{ route('sale.index') }}"
                                                                class="btn btn-info">Cancel</a>

                                                            {{-- <button type="submit" class="btn btn-light">Cancel</button> --}}
                                                        </div>

                                                    </div>
                                                </form>

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
