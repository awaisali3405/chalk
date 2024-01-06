@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row ">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-body">

                            <div class="welcome-text d-flex justify-content-center">
                                <h2>Student Information</h2>
                                @if ($errors->any())
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="academic_year_id" value="{{ auth()->user()->session()->id }}">
                <div class="text-center p-3 bg-white" style="">
                    <div class="profile-photo">
                        <img id="img" src="{{ asset('images/avatar/1.png') }}" width="100" height="100"
                            class="img-fluid rounded-circle" alt="">
                    </div>
                    <label for="upload" class="mt-3 mb-1 text-bold"> Upload Image Here</label>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-xl-12 col-xxl-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Personal Info</h5>
                                    </div>
                                    <div class="card-body">


                                        <div class="row">


                                            <input type='file' id="upload" class="d-none" name="profile_pic">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">First Name *</label>
                                                    <input type="text" class="form-control" name="first_name"
                                                        value="{{ old('first_name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name *</label>
                                                    <input type="text" class="form-control" name="last_name"
                                                        value="{{ old('last_name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Middle Name</label>
                                                    <input type="text" class="form-control" name="middle_name"
                                                        value="{{ old('middle_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone_no"
                                                        value="{{ old('phone_no') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Gender *</label>
                                                    <div class="row">
                                                        <div class="col-4">

                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="male" value="male" name="gender"
                                                                    {{ old('gender') == 'male' ? 'checked' : '' }} checked>
                                                                <label class="form-check-label" for="male">Male</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="female" value="female" name="gender"
                                                                    {{ old('gender') == 'female' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="female">Female</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="other" value="other" name="gender"
                                                                    {{ old('gender') == 'other' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="other">Other</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Nationality *</label>
                                                    <input type="text" class="form-control" name="nationality"
                                                        value="{{ old('nationality') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Place Of Birth *</label>
                                                    <input type="text" class="form-control" name="place_of_birth"
                                                        value="{{ old('place_of_birth') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Date of Birth</label>
                                                    <input type="date" class="form-control" name="dob"
                                                        value="{{ old('dob') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Main Languague</label>
                                                    <input type="text" class="form-control" name="main_language"
                                                        value="{{ old('main_language') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Other Language</label>
                                                    <input type="text" class="form-control" name="other_language"
                                                        value="{{ old('other_language') }}">
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Current School Name *</label>
                                                    <input type="text" class="form-control" name="current_school_name"
                                                        value="{{ old('current_school_name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">

                                            </div>


                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Key Stage *</label>

                                                            <select class="form-control keyStage" name="key_stage_id"
                                                                required>
                                                                <option value="">Select Key Stage</option>
                                                                @foreach ($keyStage as $value)
                                                                    <option value="{{ $value->id }}"
                                                                        {{ old('key_stage_id') == $value->id ? 'selected' : '' }}>
                                                                        {{ $value->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Year *</label>


                                                            <select
                                                                class="form-control year {{ auth()->user()->role->name == 'parent' ? 'year_enquiry' : '' }} "
                                                                name="year_id" required>

                                                            </select>


                                                        </div>
                                                    </div>


                                                    @if (auth()->user()->role->name == 'parent')
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Subjects</label>
                                                            </div>
                                                            <div class=" pl-3">
                                                                <div class="row checkbox">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super admin')
                        <div class="col-12">

                            <div class="row">
                                <div class="col-xl-12 col-xxl-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Office Use</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12" style="">
                                                    <div class="card">
                                                        <div class="card-header">

                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Lesson Type</label>

                                                                        <select class="form-control" id="lesson_type_id">
                                                                            @foreach ($lessonType as $value)
                                                                                <option value="{{ $value->id }}">
                                                                                    {{ $value->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>

                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Subject</label>

                                                                        <select class="form-control subject"
                                                                            id="subject_id">



                                                                        </select>

                                                                    </div>

                                                                </div>
                                                                <div class="col-1">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Board</label>

                                                                        <select class="form-control" id="board_id">
                                                                            <option value="">-</option>
                                                                            @foreach ($board as $value)
                                                                                <option value="{{ $value->id }}">
                                                                                    {{ $value->name }}</option>
                                                                            @endforeach

                                                                        </select>

                                                                    </div>

                                                                </div>
                                                                <div class="col-1">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Paper</label>

                                                                        <select class="form-control" id="paper_id">
                                                                            <option value="">-</option>
                                                                            @foreach ($paper as $value)
                                                                                <option value="{{ $value->id }}">
                                                                                    {{ $value->name }}</option>
                                                                            @endforeach

                                                                        </select>

                                                                    </div>

                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="form-group">

                                                                        <label class="form-label">Science Type</label>
                                                                        <select class="form-control" id="science_type_id">
                                                                            <option value="">-</option>
                                                                            @foreach ($scienceType as $value)
                                                                                <option value="{{ $value->id }}">
                                                                                    {{ $value->name }}</option>
                                                                            @endforeach

                                                                        </select>

                                                                    </div>

                                                                </div>
                                                                <div class="col-1">
                                                                    <div class="form-group">

                                                                        <label class="form-label">Rate</label>
                                                                        <input type="text" name="per_hour_rate"
                                                                            id="rate" class="form-control">


                                                                    </div>
                                                                </div>
                                                                <div class="col-1">
                                                                    <div class="form-group">

                                                                        <label class="form-label">Hours
                                                                        </label>
                                                                        <input type="text" name="no_of_hr"
                                                                            id="hours" class="form-control">


                                                                    </div>
                                                                </div>
                                                                <div class="col-1">
                                                                    <div class="form-group">

                                                                        <label class="form-label">Amount
                                                                        </label>
                                                                        <input type="text" name="amount"
                                                                            id="amount" class="form-control">


                                                                    </div>
                                                                </div>

                                                                <div class="col-1 pt-4">
                                                                    <div class="form-group">

                                                                        <label class="form-label"></label>
                                                                        <span type="button" class="btn btn-primary "
                                                                            id="add-subject">+
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="">
                                                                <table id="" class="display"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Lesson Type</th>
                                                                            <th>Subject</th>
                                                                            <th>Board</th>
                                                                            <th>Paper</th>
                                                                            <th>Science Type</th>
                                                                            <th>Rate</th>
                                                                            <th>Hours</th>
                                                                            <th>Amount</th>


                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="subject">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Branch</label>
                                                        <select class="form-control branch_student" id=""
                                                            name="branch_id" required>
                                                            <option value="">Select Branch</option>
                                                            @foreach ($branch as $value)
                                                                <option value="{{ $value->id }}"
                                                                    {{ old('branch_id') == $value->id ? 'selected' : '' }}>
                                                                    {{ $value->name }}</option>
                                                            @endforeach

                                                        </select>


                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Payment Type</label>
                                                        <select class="form-control" name="payment_period"
                                                            id="payment-type">
                                                            <option value="Weekly"
                                                                {{ old('payment_period') == 'Weekly' ? 'selected' : '' }}>
                                                                Weekly
                                                            </option>
                                                            <option value="Monthly"
                                                                {{ old('payment_period') == 'Monthly' ? 'selected' : '' }}>
                                                                Monthly</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-3">

                                                </div>
                                                <div class="col-6 ">

                                                    <h4 class="hr-lines">Tax Calculate</h4>
                                                </div>
                                                <div class="col-3">

                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">VAT%</label>
                                                        <input type="text" name="tax" id=""
                                                            class="form-control tax" value="0">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">VAT(Fee) </label>
                                                        <input type="text" name="fee_tax" id=""
                                                            class="form-control fee-tax" value="0" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">VAT(Registration)</label>
                                                        <input type="text" name="reg_tax" id="reg_tax"
                                                            id="" class="form-control" value="0" readonly>
                                                    </div>
                                                </div>

                                                @if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super admin')
                                                    <div class="row card-body">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Deposit (Refundable) *</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="40" name="deposit" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Registration (Non
                                                                    Refundable) *</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="20" name="registration_fee"
                                                                        id="registration_fee" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Annual Resources *</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="0" name="annual_resource_fee"
                                                                        id="annual_resource_fee" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 d-none">
                                                            <div class="form-group">
                                                                <label class="form-label">Resource Discount *</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" id="resource_discount"
                                                                        class="form-control" value="0"
                                                                        name="resource_discount">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Exercise Book *</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" id="exercise_book"
                                                                        class="form-control" value="0"
                                                                        name="exercise_book_fee" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Gross Weekly Fee*</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control fee"
                                                                        value="0" name="fee" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Fee Discount</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="0" name="fee_discount"
                                                                        id="fee_discount">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Net Weekly Fee</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control fee-total"
                                                                        value="0" name="total_fee" id="total_fee"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Admission Date</label>
                                                                <div class="input-group mb-2">


                                                                    <input type="date" class="form-control"
                                                                        value="" name="admission_date" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 d-none" id="monthly-fee">
                                                            <div class="form-group">
                                                                <label class="form-label">Monthly Fee</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group mb-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">£</div>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="form-control monthly-fee"
                                                                            value="0" disabled>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Annual resources</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">£</div>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            value="" name="">
                                                    </div>
                                                </div>
                                            </div> --}}
                                                    </div>
                                                @endif
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h2>Parent Guardian Detail</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if (auth()->user()->role->name == 'parent')
                            <div class="col-xl-6 col-xxl-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Parent 1 /Guardian 1 Details</h5>
                                    </div>
                                    <div class="card-body " id="parent">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mr./Mrs./Ms./Other</label>
                                                    <input type="text" class="form-control disabled"
                                                        value="{{ auth()->user()->parent->first_name }}"
                                                        name="first_name" disabled>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->parent->last_name }}" name="last_name"
                                                        disabled>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->parent->given_name }}"
                                                        name="given_name" disabled>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <div class="row">
                                                        <div class="col-4">

                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="male" value="male" name="gender"
                                                                    {{ auth()->user()->parent->gender == 'male' ? 'checked' : '' }}
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="male">Male</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="female" value="female" name="gender"
                                                                    {{ auth()->user()->parent->gender == 'female' ? 'checked' : '' }}
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="female">Female</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="other" value="other" name="gender"
                                                                    {{ auth()->user()->parent->gender == 'other' ? 'checked' : '' }}
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="other">Other</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Relationship to Student</label>

                                                    <input type="text" list="parent"
                                                        value="{{ auth()->user()->parent->relationship }}"
                                                        class="form-control" name="relationship" disabled>
                                                    <datalist id="parent">
                                                        <option>Father</option>
                                                        <option>Mother</option>
                                                        <option>Uncle</option>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Employment Status</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->parent->emp_status }}"
                                                        name="emp_status" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Company Name</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->parent->company_name }}"
                                                        name="company_name" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Work Phone Number</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->parent->work_phone_number }}"
                                                        name="work_phone_number" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile Number</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->parent->mobile_number }}"
                                                        name="mobile_number" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email Address
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->parent->email }}" name="email"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" id="formatted_address_0" class="form-control"
                                                        name="f_address_line[]"
                                                        value="{{ auth()->user()->parent->res_address }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Second Address Line </label>
                                                    <input type="text" id="formatted_address_1" class="form-control"
                                                        name="s_address_line[]"
                                                        value="{{ auth()->user()->parent->res_second_address }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Third Address Line</label>
                                                    <input type="text" id="formatted_address_2" class="form-control"
                                                        name="t_address_line[]"
                                                        value="{{ auth()->user()->parent->res_third_address }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Town</label>
                                                    <input type="text" id="town_or_city" class="form-control"
                                                        name="town[]" value="{{ auth()->user()->parent->res_town }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> County </label>
                                                    <input type="text" id="county" class="form-control"
                                                        name="county[]" value="{{ auth()->user()->parent->res_country }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Postcode</label>
                                                    <input type="text" id="postcode" class="form-control"
                                                        name="res_address1[]"
                                                        value="{{ auth()->user()->parent->res_postal }}" disabled>
                                                </div>
                                            </div>




                                        </div>


                                    </div>
                                </div>

                            </div>
                        @else
                            <div class="col-xl-6 col-xxl-6 col-sm-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Parent 1 /Guardian 1 Details</h5>
                                    </div>

                                    <div class="card-body " id="parent">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Selected Parent</label>
                                                    <select name="parent_id" id="p_select" class="form-control"
                                                        required>
                                                        <option value="">-</option>
                                                        @foreach ($parent as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @dd($student->parents) --}}
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mr./Mrs./Ms./Other</label>
                                                    <input type="text" class="form-control" id="p_first_name"
                                                        name="first_name[]" disabled>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="p_last_name"
                                                        name="last_name[]" disabled>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="p_given_name"
                                                        name="given_name[]" disabled>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <div class="row">
                                                        <div class="col-4">

                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="p_male" value="male" name="gender1"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="male">Male</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="p_female" value="female" name="gender1"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="female">Female</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="p_other" value="other" name="gender1"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="other">Other</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Relationship to Student</label>

                                                    <input type="text" list="parent" class="form-control"
                                                        id="p_relation" name="relationship[]" disabled>
                                                    <datalist id="parent">
                                                        <option>Father</option>
                                                        <option>Mother</option>
                                                        <option>Uncle</option>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Employment Status</label>
                                                    <input type="text" class="form-control" id="p_emp_status"
                                                        name="emp_status[]" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="p_company_name"
                                                        name="company_name[]" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Work Phone Number</label>
                                                    <input type="text" class="form-control" id="p_work"
                                                        name="work_phone_number[]" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile Number</label>
                                                    <input type="text" class="form-control" name="mobile_number[]"
                                                        id="p_mobile" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email Address
                                                    </label>
                                                    <input type="text" class="form-control" name="email[]"
                                                        id="p_email" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" id="formatted_address_0" class="form-control"
                                                        name="f_address_line[]" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Second Address Line </label>
                                                    <input type="text" id="formatted_address_1" class="form-control"
                                                        name="s_address_line[]" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Third Address Line</label>
                                                    <input type="text" id="formatted_address_2" class="form-control"
                                                        name="t_address_line[]" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Town</label>
                                                    <input type="text" id="town_or_city" class="form-control"
                                                        name="town[]" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> County </label>
                                                    <input type="text" id="county" class="form-control"
                                                        name="county[]" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Postcode</label>
                                                    <input type="text" id="postcode" class="form-control"
                                                        name="res_address1[]" disabled>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-xl-6 col-xxl-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Parent 2 /Guardian 2 Details</h5>
                                </div>

                                <div class="card-body " id="parent">
                                    <div class="card-body " id="parent">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mr./Mrs./Ms./Other</label>
                                                    <input type="text" class="form-control" name="first_name1">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" name="last_name1">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" name="given_name1">

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <div class="row">
                                                        <div class="col-4">

                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="male" value="male" name="gender1">
                                                                <label class="form-check-label"
                                                                    for="male">Male</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="female" value="female" name="gender1">
                                                                <label class="form-check-label"
                                                                    for="female">Female</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="other" value="other" name="gender1">
                                                                <label class="form-check-label"
                                                                    for="other">Other</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Relationship to Student</label>

                                                    <input type="text" list="parent" class="form-control"
                                                        name="relationship1">
                                                    <datalist id="parent">
                                                        <option>Father</option>
                                                        <option>Mother</option>
                                                        <option>Uncle</option>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Employment Status</label>
                                                    <input type="text" class="form-control" name="emp_status1">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" name="company_name1">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Work Phone Number</label>
                                                    <input type="text" class="form-control" name="work_phone_number1">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile Number</label>
                                                    <input type="text" class="form-control" name="mobile_number1">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email Address
                                                    </label>
                                                    <input type="text" class="form-control" name="email1">
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h2>Other Person Authorize to Collect Student</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-xl-6 col-xxl-6 col-sm-12">
                            <div class="card">


                                <div class="card-body " id="parent">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" name="o_full_name_1"
                                                    value="{{ old('o_full_name_1') }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Phone</label>
                                                <input type="text" class="form-control" name="o_work_phone_1"
                                                    value="{{ old('o_work_phone_1') }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Relationship to Student</label>

                                                <input type="text" list="parent" class="form-control"
                                                    value="{{ old('o_relationship_1') }}" name="o_relationship_1">
                                                <datalist id="parent">
                                                    <option>Father</option>
                                                    <option>Mother</option>
                                                    <option>Uncle</option>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Phone</label>
                                                <input type="text" class="form-control" name="o_mobile_phone_1"
                                                    value="{{ old('o_mobile_phone_1') }}">

                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Place</label>
                                                <input type="text" class="form-control" name="o_work_place_1"
                                                    value="{{ old('o_work_place_1') }}">
                                            </div>
                                        </div>






                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-sm-12">
                            <div class="card">


                                <div class="card-body " id="parent">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" name="o_full_name_2"
                                                    value="{{ old('o_full_name_2') }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Phone</label>
                                                <input type="text" class="form-control" name="o_work_phone_2"
                                                    value="{{ old('o_work_phone_2') }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Relationship to Student</label>

                                                <input type="text" list="parent" class="form-control"
                                                    value="{{ old('o_relationship_2') }}" name="o_relationship_2">
                                                <datalist id="parent">
                                                    <option>Father</option>
                                                    <option>Mother</option>
                                                    <option>Uncle</option>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Phone</label>
                                                <input type="text" class="form-control" name="o_mobile_phone_2"
                                                    value="{{ old('o_mobile_phone_2') }}">

                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Place</label>
                                                <input type="text" class="form-control" name="o_work_place_2"
                                                    value="{{ old('o_work_place_2') }}">
                                            </div>
                                        </div>






                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h2>Emergency Contact if Parent/Guadiasn cannot be contacted</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-xl-6 col-xxl-6 col-sm-12">
                            <div class="card">


                                <div class="card-body " id="parent">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" name="e_full_name_1"
                                                    value="{{ old('e_full_name_1') }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Phone</label>
                                                <input type="text" class="form-control" name="e_work_phone_1"
                                                    value="{{ old('e_work_phone_1') }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Relationship to Student</label>

                                                <input type="text" list="parent" class="form-control"
                                                    value="{{ old('e_relationship_1') }}" name="e_relationship_1">
                                                <datalist id="parent">
                                                    <option>Father</option>
                                                    <option>Mother</option>
                                                    <option>Uncle</option>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Phone</label>
                                                <input type="text" class="form-control" name="e_mobile_phone_1"
                                                    value="{{ old('e_mobile_phone_1') }}">

                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Other Contact Info</label>
                                                <input type="text" class="form-control" name="e_contact_info_1"
                                                    value="{{ old('e_contact_info_1') }}">
                                            </div>
                                        </div>






                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-sm-12">
                            <div class="card">


                                <div class="card-body " id="parent">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" name="e_full_name_2"
                                                    value="{{ old('e_full_name_2') }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Phone</label>
                                                <input type="text" class="form-control" name="e_work_phone_2"
                                                    value="{{ old('e_work_phone_2') }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Relationship to Student</label>

                                                <input type="text" list="parent" class="form-control"
                                                    value="{{ old('e_relationship_2') }}" name="e_relationship_2">
                                                <datalist id="parent">
                                                    <option>Father</option>
                                                    <option>Mother</option>
                                                    <option>Uncle</option>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Phone</label>
                                                <input type="text" class="form-control" name="e_mobile_phone_2"
                                                    value="{{ old('e_mobile_phone_2') }}">

                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Other Contact Info</label>
                                                <input type="text" class="form-control" name="e_contact_info_2"
                                                    value="{{ old('e_contact_info_2') }}">
                                            </div>
                                        </div>






                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h2>Disabilty, Medical Condition and behavioral Disorder</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Does the student have disablilty, medical condition
                                                and behavioural disorder which may affect his or her academic
                                                performance?</label>
                                            <div class="row">
                                                <div class="col-4">

                                                    <div class="form-check">

                                                        <input type="radio" class="form-check-input" id="is_disorder"
                                                            value="1" name="is_disable">
                                                        <label class="form-check-label" for="is_disable">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">

                                                    <div class="form-check">

                                                        <input type="radio" class="form-check-input"
                                                            id="is_disorder_not" value="0" name="is_disable"
                                                            checked>
                                                        <label class="form-check-label" for="is_disorder_not">No</label>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">If yes, please specify:</label>
                                            <textarea name="disorder_detail" class="form-control" id="">{{ old('disorder_detail') }}</textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h2>Confirmation Form</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if (auth()->user()->role->name == 'parent')
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Signature Person</label>

                                                <input type="text" class="form-control" name="signature_person"
                                                    value="{{ auth()->user()->parent->given_name }}" id="">


                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">How do you Know About Us</label>

                                            <input list="browsers" name="know_about_us" id="browser"
                                                value="{{ old('know_about_us') }}" class="form-control" required>
                                            <datalist id="browsers">
                                                <option value="Leaflet">
                                                <option value="Google">
                                                <option value="Facebook">
                                                <option value="Friends/Family">

                                            </datalist>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 d-none" id="reference-student-container">
                                        <div class="form-group">
                                            <label class="form-label">Referred Student</label>

                                            <select name="reference_student" id="" class="form-control">
                                                <option value="">Select Student</option>
                                                @foreach ($referenceStudent as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name() }}
                                                        ({{ $value->currentYear()->name }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Do you have any comments or feedback?</label>
                                            <input type="text" class="form-control" name="feedback"
                                                id="" value="{{ old('feedback') }}">


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="" id="check_all_agreemnet">
                                            <label class="form-label pl-2"> Check All</label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="" name="" id=""
                                                required>
                                            <label class="form-label pl-2">I consent for my data to be stored in line with
                                                the
                                                Privacy Policy.Read our Privacy Policy here.
                                            </label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="" required>
                                            <label class="form-label pl-2">I accept the terms & conditions. Read our T&Cs
                                                here.
                                            </label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="" required>
                                            <label class="form-label pl-2">I agree for Chalk'n'Duster to contact me with
                                                details of their services.
                                                We will send you info about our tutoring services. Of course you can opt out
                                                at any time.
                                            </label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">

                                            <input type="checkbox" name="">
                                            <label class="form-label pl-2">I consent to any necessary emergency treatment
                                                whilst my child is attending the course and authorize the staff to sign any
                                                form of
                                                consent required by medical staff if a delay in obtaining my signature could
                                                endanger my child's health or safety.
                                            </label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="">
                                            <label class="form-label pl-2">I have provided the copies of RECENT
                                                proof of address and ID.
                                            </label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="">
                                            <label class="form-label pl-2">I understand that I am responsible for
                                                monthly or four/five weeks payment of the tuition fees and for the
                                                resources within the given deadline.
                                            </label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="" id="check_all_agreemnet">
                                            <label class="form-label pl-2">I declare that, to the best of my
                                                knowledge, the information provided in this application form is
                                                accurate and agree to abide by all the given terms and conditions
                                                specified from points 1 to 24.


                                            </label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="" id="check_all_agreemnet">
                                            <label class="form-label pl-2">I also consent to any necessary
                                                emergency medical treatment whilst my child is attending CND and
                                                authorize the staff to sign any form of consent required by medical
                                                staff if a delay in obtaining my signature could endanger my child's
                                                health or safety.

                                            </label>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('student.index') }}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
@endsection
