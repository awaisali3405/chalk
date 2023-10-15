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
                                <h2>Student Informatioin</h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" name="first_name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Middle Name</label>
                                                    <input type="text" class="form-control" name="middle_name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone_no" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <div class="row">
                                                        <div class="col-4">

                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="male" value="male" name="gender">
                                                                <label class="form-check-label" for="male">Male</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="female" value="female" name="gender">
                                                                <label class="form-check-label"
                                                                    for="female">Female</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="other" value="other" name="gender">
                                                                <label class="form-check-label" for="other">Other</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Nationality</label>
                                                    <input type="text" class="form-control" name="nationality" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Place Of Birth</label>
                                                    <input type="text" class="form-control" name="place_of_birth"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Main Languague</label>
                                                    <input type="text" class="form-control" name="main_language"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Other Language</label>
                                                    <input type="text" class="form-control" name="other_language">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Date of Birth</label>
                                                    <input type="date" class="form-control" name="dob" required>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Ethnic Group</label>


                                                    <select class="form-control" name="ethic_group">
                                                        <option value=""> - </option>
                                                        <option value="Arab">Arab</option>
                                                        <option value="Asian - Other">Asian - Other</option>
                                                        <option value="Asian - Bangladeshi">Asian - Bangladeshi</option>
                                                        <option value="Asian - Chinese">Asian - Chinese</option>
                                                        <option value="Asian - Indian">Asian - Indian</option>
                                                        <option value="Asian - Pakistani">Asian - Pakistani</option>
                                                        <option value="Black - African">Black - African</option>
                                                        <option value="Black - Black Other">Black - Black Other</option>
                                                        <option value="Black - Caribbean">Black - Caribbean</option>
                                                        <option value="Mixed - White &amp; Asian">Mixed - White &amp; Asian
                                                        </option>
                                                        <option value="Mixed - White &amp; Black African">Mixed - White
                                                            &amp; Black
                                                            African</option>
                                                        <option value="Mixed - White &amp; Black Caribbean">Mixed - White
                                                            &amp;
                                                            Black Caribbean</option>
                                                        <option value="Mixed - Other">Mixed - Other</option>
                                                        <option value="White - British">White - British</option>
                                                        <option value="White - White Irish">White - White Irish</option>
                                                        <option value="White - White Other">White - White Other</option>
                                                        <option value="Other Ethnic Group">Other Ethnic Group</option>
                                                        <option value="Prefer not to say">Prefer not to say</option>


                                                    </select>


                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Relegion</label>


                                                    <select class="form-control" name="religion" required>
                                                        <option value=""> - </option>
                                                        <option value="No Religion">No Religion</option>
                                                        <option value="Buddhist">Buddhist</option>
                                                        <option value="Christian">Christian</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Jewish">Jewish</option>
                                                        <option value="Muslim">Muslim</option>
                                                        <option value="Sikh">Sikh</option>
                                                        <option value="Other">Other</option>
                                                        <option value="Prefer not to say">Prefer not to say</option>


                                                    </select>


                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Home Language</label>
                                                    <input type="text" class="form-control" name="home_language"
                                                        required>
                                                </div>
                                            </div> --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Current School Name</label>
                                                    <input type="text" class="form-control" name="current_school_name"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Current Year</label>
                                                    <input type="date" class="form-control" name="current_year"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Lession Type</label>
                                                    <div class="row">
                                                        <div class="col-3 ">

                                                            <div class="form-check">

                                                                <input type="radio" name="lesson_type"
                                                                    value="Normal Group" id="Normal Group" required>
                                                                <label class="form-check-label" for="Normal Group">Normal
                                                                    Group</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 ">

                                                            <div class="form-check">

                                                                <input type="radio" name="lesson_type"
                                                                    value="Small Group" id="Small Group" required>
                                                                <label class="form-check-label" for="Small Group">Small
                                                                    Group</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 ">

                                                            <div class="form-check">

                                                                <input type="radio" name="lesson_type"
                                                                    value="One - One" id="One - One" required>
                                                                <label class="form-check-label" for="One - One">One -
                                                                    One</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 ">

                                                            <div class="form-check">

                                                                <input type="radio" name="lesson_type"
                                                                    value="H/W Help Group" id="H/W Help Group" required>
                                                                <label class="form-check-label" for="H/W Help Group">H/W
                                                                    Help Group</label>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Key Stage</label>

                                                            <select class="form-control keyStage" name="key_stage_id"
                                                                required>
                                                                <option value="">Select Key Stage</option>
                                                                @foreach ($keyStage as $value)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Year</label>


                                                            <select class="form-control year" name="year_id" required>

                                                            </select>


                                                        </div>
                                                    </div>



                                                    <div class="col-12" style="">
                                                        <div class="card">
                                                            <div class="card-header">

                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Subject</label>

                                                                            <select class="form-control subject"
                                                                                id="subject_id">



                                                                            </select>

                                                                        </div>

                                                                    </div>
                                                                    <div class="col-3">
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
                                                                    <div class="col-3">
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
                                                                            <select class="form-control"
                                                                                id="science_type_id">
                                                                                <option value="">-</option>
                                                                                @foreach ($scienceType as $value)
                                                                                    <option value="{{ $value->id }}">
                                                                                        {{ $value->name }}</option>
                                                                                @endforeach

                                                                            </select>

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
                                                                                <th>Subject</th>
                                                                                <th>Board</th>
                                                                                <th>Paper</th>
                                                                                <th>Science Type</th>


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

                                                    {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="submit" class="btn btn-light">Cencel</button>
                                                    </div> --}}
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
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Branch</label>
                                                        <select class="form-control" name="branch_id">
                                                            <option value="">Select Branch</option>
                                                            @foreach ($branch as $value)
                                                                <option value="{{ $value->id }}">
                                                                    {{ $value->name }}</option>
                                                            @endforeach

                                                        </select>


                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Payment Type</label>
                                                        <select class="form-control" name="payment_period">
                                                            <option value="Weekly">Weekly</option>
                                                            <option value="Monthly">Monthly</option>

                                                        </select>

                                                    </div>
                                                </div>

                                                @if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super admin')
                                                    <div class="row card-body">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Deposit (Refundable)</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="40" name="deposit">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Registration (Non
                                                                    Refundable)</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="20" name="registration_fee">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Annual resources</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="0" name="annual_resource_fee">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 d-none">
                                                            <div class="form-group">
                                                                <label class="form-label">Resource Discount</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="0" name="resource_discount">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Exercise Book</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="0" name="exercise_book_fee">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Fee</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="0" name="fee">
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
                                                                        value="0" name="fee_discount">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Admission Date</label>
                                                                <div class="input-group mb-2">


                                                                    <input type="date" class="form-control"
                                                                        value="" name="admission_date">
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
                    {{-- @endif --}}
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
                                        {{-- @dd($student->parents) --}}
                                        {{-- @dd(auth()->user()->parent) --}}
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
                                                    <label class="form-label">Family Name</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->parent->last_name }}" name="last_name"
                                                        disabled>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Given Name</label>
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
                                                    <label class="form-label">Mailing Address </label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->parent->mail_address }}"
                                                        name="mail_address" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Resdential Adress </label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->parent->res_address }}"
                                                        name="res_address" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mailing Address</label>
                                                    <input type="text" id="formatted_address_0" class="form-control"
                                                        name="f_address_line[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Second Mailing Address Line </label>
                                                    <input type="text" id="formatted_address_1" class="form-control"
                                                        name="s_address_line[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Third Mailing Address Line</label>
                                                    <input type="text" id="formatted_address_2" class="form-control"
                                                        name="t_address_line[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Mailing Town</label>
                                                    <input type="text" id="town_or_city" class="form-control"
                                                        name="town[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Mailing County </label>
                                                    <input type="text" id="county" class="form-control"
                                                        name="county[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Mailing Postcode</label>
                                                    <input type="text" id="postcode" class="form-control"
                                                        name="res_address1[]">
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
                                        {{-- @dd($student->parents) --}}
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mr./Mrs./Ms./Other</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ old('first_name') }}" name="first_name[]" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Family Name</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ old('last_name') }}" name="last_name[]" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Given Name</label>
                                                    <input type="text" class="form-control" name="given_name[]"
                                                        required>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <div class="row">
                                                        <div class="col-4">

                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="male" value="male" name="gender[]"
                                                                    required>
                                                                <label class="form-check-label"
                                                                    for="male">Male</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="female" value="female" name="gender[]"
                                                                    required>
                                                                <label class="form-check-label"
                                                                    for="female">Female</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="other" value="other" name="gender[]"
                                                                    required>
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
                                                        name="relationship[]" required>
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
                                                    <input type="text" class="form-control" name="emp_status[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" name="company_name[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Work Phone Number</label>
                                                    <input type="text" class="form-control"
                                                        name="work_phone_number[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile Number</label>
                                                    <input type="text" class="form-control" name="mobile_number[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email Address
                                                    </label>
                                                    <input type="text" class="form-control" name="email[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mailing Address</label>
                                                    <input type="text" id="formatted_address_0" class="form-control"
                                                        name="f_address_line[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Second Mailing Address Line </label>
                                                    <input type="text" id="formatted_address_1" class="form-control"
                                                        name="s_address_line[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Third Mailing Address Line</label>
                                                    <input type="text" id="formatted_address_2" class="form-control"
                                                        name="t_address_line[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Mailing Town</label>
                                                    <input type="text" id="town_or_city" class="form-control"
                                                        name="town[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Mailing County </label>
                                                    <input type="text" id="county" class="form-control"
                                                        name="county[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Mailing Postcode</label>
                                                    <input type="text" id="postcode" class="form-control"
                                                        name="res_address1[]">
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
                                    {{-- @dd($student->parents) --}}
                                    <div class="card-body " id="parent">
                                        {{-- @dd($student->parents) --}}
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mr./Mrs./Ms./Other</label>
                                                    <input type="text" class="form-control" name="first_name1[]">

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Family Name</label>
                                                    <input type="text" class="form-control" name="last_name1[]">

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Given Name</label>
                                                    <input type="text" class="form-control" name="given_name1[]">

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <div class="row">
                                                        <div class="col-4">

                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="male" value="male" name="gender1[]">
                                                                <label class="form-check-label"
                                                                    for="male">Male</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="female" value="female" name="gender1[]">
                                                                <label class="form-check-label"
                                                                    for="female">Female</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">

                                                                <input type="radio" class="form-check-input"
                                                                    id="other" value="other" name="gender1[]">
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
                                                        name="relationship1[]">
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
                                                    <input type="text" class="form-control" name="emp_status1[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" name="company_name1[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Work Phone Number</label>
                                                    <input type="text" class="form-control"
                                                        name="work_phone_number1[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile Number</label>
                                                    <input type="text" class="form-control" name="mobile_number1[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email Address
                                                    </label>
                                                    <input type="text" class="form-control" name="email1[]">
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
                                                <input type="text" class="form-control" name="o_full_name_1">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Phone</label>
                                                <input type="text" class="form-control" name="o_work_phone_1">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Relationship to Student</label>

                                                <input type="text" list="parent" class="form-control"
                                                    name="o_relationship_1">
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
                                                <input type="text" class="form-control" name="o_mobile_phone_1">

                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Place</label>
                                                <input type="text" class="form-control" name="o_work_place_1">
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
                                                <input type="text" class="form-control" name="o_full_name_2">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Phone</label>
                                                <input type="text" class="form-control" name="o_work_phone_2">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Relationship to Student</label>

                                                <input type="text" list="parent" class="form-control"
                                                    name="o_relationship_2">
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
                                                <input type="text" class="form-control" name="o_mobile_phone_2">

                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Place</label>
                                                <input type="text" class="form-control" name="o_work_place_2">
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
                                                <input type="text" class="form-control" name="e_full_name_1">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Phone</label>
                                                <input type="text" class="form-control" name="e_work_phone_1">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Relationship to Student</label>

                                                <input type="text" list="parent" class="form-control"
                                                    name="e_relationship_1">
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
                                                <input type="text" class="form-control" name="e_mobile_phone_1">

                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Other Contact Info</label>
                                                <input type="text" class="form-control" name="e_contact_info_1">
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
                                                <input type="text" class="form-control" name="e_full_name_2">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Work Phone</label>
                                                <input type="text" class="form-control" name="e_work_phone_2">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Relationship to Student</label>

                                                <input type="text" list="parent" class="form-control"
                                                    name="e_relationship_2">
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
                                                <input type="text" class="form-control" name="e_mobile_phone_2">

                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Other Contact Info</label>
                                                <input type="text" class="form-control" name="e_contact_info_2">
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
                                                            value="1" name="is_disorder">
                                                        <label class="form-check-label" for="is_disorder">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">

                                                    <div class="form-check">

                                                        <input type="radio" class="form-check-input"
                                                            id="is_disorder_not" value="0" name="is_disorder">
                                                        <label class="form-check-label" for="is_disorder_not">No</label>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">If yes, please specify:</label>
                                            <textarea name="disorder_detail" class="form-control" id=""></textarea>

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
                                                class="form-control" required>
                                            <datalist id="browsers">
                                                <option value="Leaflet">
                                                <option value="Google">
                                                <option value="Facebook">
                                                <option value="Friends/Family">

                                            </datalist>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Do you have any comments or feedback?</label>
                                            <input type="text" class="form-control" name="feedback" id="">


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
                                            <label class="form-label pl-2">I am aware that my deposit of £40 will be
                                                refunded only if I comply with the transmission procedure and all payments
                                                are up to
                                                date.
                                            </label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="">
                                            <label class="form-label pl-2">I am aware that if child misses a lesson for any
                                                reason, class will not be refunded.

                                            </label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="" id="check_all_agreemnet">
                                            <label class="form-label pl-2">I certify that I have read and understood the
                                                Terms
                                                and Conditions of Chalk'n'Duster Ltd accompanied with this enrolment form on
                                                page 3 & 4 and that all information provided are true and correct.


                                            </label>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="" id="check_all_agreemnet">
                                            <label class="form-label pl-2">I understand that I am responsible for payment
                                                of
                                                all tuition fees and stationary including resources by the due dates and on
                                                occasion of non-payment as agreed on the time of application, information
                                                will be passed to the external debt collection agencies.

                                            </label>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('student.index') }}" class="btn btn-light">Cencel</a>
            </form>
        </div>
    </div>
@endsection
