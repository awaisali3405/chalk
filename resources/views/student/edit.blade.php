@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Staff</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Staff</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Staff</a></li>
                    </ol>
                </div>
            </div>
            <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="text-center p-3 bg-white" style="">
                    <div class="profile-photo">
                        <img id="img" src="{{ asset($student->profile_pic) }}" width="100" height="100"
                            class="img-fluid rounded-circle" alt="">
                    </div>
                    <label for="upload" class="mt-3 mb-1 text-bold"> Change Image Here</label>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-xl-12 col-xxl-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Basic Info</h5>
                                    </div>
                                    <div class="card-body">


                                        <div class="row">

                                            <input type="hidden" id="student_id" value="{{ $student->id }}">
                                            <input type='file' id="upload" class="d-none" name="profile_pic">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" name="first_name"
                                                        value="{{ $student->first_name }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name"
                                                        value='{{ $student->last_name }}' required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Date of Birth</label>
                                                    <input type="date" class="form-control" name="dob"
                                                        value="{{ $student->dob }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $student->email }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone_no"
                                                        value="{{ $student->phone_no }}" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Post Code</label>
                                                    <input type="text" class="form-control" name="post_code"
                                                        value="{{ $student->post_code }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Ethnic Group</label>


                                                    <select class="form-control" name="ethic_group" required>

                                                        <option value="{{ $student->ethic_group }}">
                                                            {{ $student->ethic_group }}</option>
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
                                                    <label class="form-label">Religion</label>


                                                    <select class="form-control" name="religion" required>
                                                        <option value="{{ $student->religion }}">
                                                            {{ $student->religion }}</option>
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
                                                        value="{{ $student->home_language }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Current School Name</label>
                                                    <input type="text" class="form-control" name="current_school_name"
                                                        value="{{ $student->current_school_name }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Year</label>


                                                    <select class="form-control" name="year_id">
                                                        <option value="">Select Year Stage</option>
                                                        @foreach ($year as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ $value->id == $student->year_id ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach

                                                    </select>


                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Session</label>

                                                    <select class="form-control" name="key_stage_id">
                                                        <option value="">Select Session</option>
                                                        @foreach ($keyStage as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ $value->id == $student->key_stage_id ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Lession Type</label>

                                                    <div class="form-group">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="lesson_type"
                                                                {{ 'Normal Group' == $student->lesson_type ? 'checked' : '' }}
                                                                value="Normal Group">Normal
                                                            Group</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="lesson_type" value="Small Group"
                                                                {{ 'Small Group' == $student->lesson_type ? 'checked' : '' }}>
                                                            Small
                                                            Group</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="lesson_type"
                                                                value="One - One"{{ 'One - One' == $student->lesson_type ? 'checked' : '' }}>
                                                            One -
                                                            One</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Branch</label>
                                                    <select class="form-control" name="branch_id" required>
                                                        <option value="">Select Branch</option>
                                                        @foreach ($branch as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ $value->id == $student->branch_id ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach

                                                    </select>


                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Payment Type</label>
                                                    <select class="form-control" name="payment_period">
                                                        <option value="Weekly"
                                                            {{ 'Weekly' == $student->payment_period ? 'selected' : '' }}>
                                                            Weekly</option>
                                                        <option value="Monthly"
                                                            {{ 'Monthly' == $student->payment_period ? 'selected' : '' }}>
                                                            Monthly</option>

                                                    </select>

                                                </div>
                                            </div>


                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-xl-12 col-xxl-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Basic Info</h5>
                                    </div>
                                    <div class="card-body">


                                        <div class="row">




                                            <div class="" style="">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Subject</label>

                                                                    <select class="form-control" id="subject_id">

                                                                        @foreach ($subject as $value)
                                                                            <option value="{{ $value->id }}">
                                                                                {{ $value->name }}</option>
                                                                        @endforeach

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
                                                            <div class="col-3">
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
                                                        </div>
                                                        <div class="col-1">
                                                            <div class="form-group">

                                                                <label class="form-label"></label>
                                                                <span type="button" class="btn btn-primary "
                                                                    id="add-subject">+
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="">
                                                            <table id="" class="display" style="width:100%;">
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
                                                                    @foreach ($student->enquirySubject as $value)
                                                                        <tr>
                                                                            <td>{{ $value->subject->name }}</td>
                                                                            <td>{{ $value->board ? $value->board->name : '-' }}
                                                                            </td>
                                                                            <td>{{ $value->paper ? $value->paper->name : '-' }}
                                                                            </td>
                                                                            <td>{{ $value->scienceType ? $value->scienceType->name : '-' }}
                                                                            </td>
                                                                            <td>
                                                                                <input type="hidden"
                                                                                    value="{{ $value->id }}"
                                                                                    class="id"
                                                                                    name="enquiry_subject[]">
                                                                                <a class="delete-subject"
                                                                                    href="javascript:void(0);"><i
                                                                                        class=" fa fa-close color-danger"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row card-body">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Deposit (Refundable)</label>
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">£</div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->deposit }}" name="deposit" required>
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
                                                                name="registration_fee"
                                                                value="{{ $student->registration_fee }}" required>
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
                                                                value="{{ $student->annual_resource_fee }}"
                                                                name="annual_resource_fee" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12  d-none">
                                                    <div class="form-group">
                                                        <label class="form-label">Resource Discount</label>
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">£</div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->resource_discount }}"
                                                                name="resource_discount" required>
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
                                                                value="{{ $student->exercise_book_fee }}"
                                                                name="exercise_book_fee">
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
                                                                value="{{ $student->fee }}" name="fee" required>
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
                                                                value="{{ $student->fee_discount }}" name="fee_discount"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Admission Date</label>
                                                        <div class="input-group mb-2">


                                                            <input type="date" class="form-control"
                                                                value="{{ $student->admission_date }}"
                                                                name="admission_date" required>
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
                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Parent Info</h5>
                            </div>

                            <div class="card-body " id="parent">
                                {{-- @dd($student->parents) --}}
                                @forelse ($student->parents as $key => $value)
                                    <div class="row">

                                        <input type="hidden" name="parent[]" value="{{ $value->id }}">

                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">RelationShip</label>
                                                <select class="form-control select2" style="width: 100%;"
                                                    name="relationship[]">
                                                    <option value="Father"
                                                        {{ $value->first_name == 'Father' ? 'selected' : '' }}>Father
                                                    </option>
                                                    <option value="Mother"
                                                        {{ $value->first_name == 'Mother' ? 'selected' : '' }}>Mother
                                                    </option>
                                                    <option value="Brother"
                                                        {{ $value->first_name == 'Brother' ? 'selected' : '' }}>Brother
                                                    </option>
                                                    <option value="Other"
                                                        {{ $value->first_name == 'Other' ? 'selected' : '' }}>Other
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" name="first_name1[]"
                                                    value="{{ $value->first_name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" name="last_name1[]"
                                                    value="{{ $value->last_name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address[]"
                                                    value="{{ $value->address }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Contact</label>
                                                <input type="text" class="form-control" name="contact[]"
                                                    value="{{ $value->contact }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email1[]"
                                                    value="{{ $value->email }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Occupation</label>
                                                <input type="text" class="form-control" name="occupation[]"
                                                    value="{{ $value->occupation }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Post Code</label>
                                                <input type="text" class="form-control" name="post_code1[]"
                                                    value="{{ $value->post_code }}">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group pt-4">

                                                <label class="form-label"></label>
                                                @if ($key == 0)
                                                    <span type="button" class="btn btn-primary " id="add-parent">+
                                                    </span>
                                                @else
                                                    <span type="button" class="btn btn-primary remove-parent">-
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="row">



                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">RelationShip</label>
                                                <select class="form-control select2" style="width: 100%;"
                                                    name="relationship[]">
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Brother">Brother</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" name="first_name1[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" name="last_name1[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Contact</label>
                                                <input type="text" class="form-control" name="contact[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email1[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Occupation</label>
                                                <input type="text" class="form-control" name="occupation[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Post Code</label>
                                                <input type="text" class="form-control" name="post_code[]">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group pt-4">

                                                <label class="form-label"></label>
                                                <span type="button" class="btn btn-primary " id="add-parent">+
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('student.index') }}" class="btn btn-light">Cencel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
