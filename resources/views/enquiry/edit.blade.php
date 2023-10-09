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

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Basic Info</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('enquiry.update', $enquiry->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="enquiry_id" value="{{ $enquiry->id }}">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Caller</label>
                                            <input type="text" class="form-control" name="caller_name"
                                                value="{{ $enquiry->caller_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Relationship
                                            </label>
                                            <input type="text" class="form-control" name="relationship"
                                                value="{{ $enquiry->relationship }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name"
                                                value="{{ $enquiry->first_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ $enquiry->last_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="dob"
                                                value="{{ $enquiry->dob }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $enquiry->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone_no"
                                                value="{{ $enquiry->phone_no }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" class="form-control" name="mobile_no"
                                                value="{{ $enquiry->mobile_no }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $enquiry->address }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Current School Name</label>
                                            <input type="text" class="form-control" name="current_school_name"
                                                value="{{ $enquiry->current_school_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Year</label>
                                            <div class="col-lg-6 col-md-6 col-sm-12">

                                                <select class="form-control" name="year_id">
                                                    <option value="">-</option>
                                                    @foreach ($year as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $value->id == $enquiry->year_id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Session</label>
                                            <div class="col-lg-6 col-md-6 col-sm-12">

                                                <select class="form-control" name="key_stage_id">
                                                    <option value="">Select Session</option>
                                                    @foreach ($keyStage as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $value->id == $enquiry->key_stage_id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Lession Type</label>

                                            <div class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="lesson_type" value="Normal Group">Normal
                                                    Group</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="lesson_type" value="Small Group"> Small
                                                    Group</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="lesson_type" value="One - One"> One -
                                                    One</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Branch</label>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <select class="form-control" name="branch_id">
                                                    <option value="">Select Branch</option>
                                                    @foreach ($branch as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $value->id == $enquiry->branch_id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Enquiry Date</label>
                                            <input type="date" class="form-control" name="enquiry_date"
                                                value="{{ $enquiry->enquiry_date }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Assessment Date</label>
                                            <input type="date" class="form-control" name="assessment_date"
                                                value="{{ $enquiry->assessment_date }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Assessment Time</label>
                                            <input type="time" class="form-control" name="assessment_time"
                                                value="{{ $enquiry->assessment_time }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">How do you Know About Us</label>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <input list="browsers" name="know_about_us" id="browser"
                                                    value="{{ $enquiry->know_about_us }}" class="form-control" required>
                                                <datalist id="browsers">
                                                    <option value="Leaflet">
                                                    <option value="Google">
                                                    <option value="Facebook">
                                                    <option value="Friends/Family">

                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" style="padding-left: 15%; width: 70%;">
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
                                                        <span type="button" class="btn btn-primary " id="add-subject">+
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
                                                            @foreach ($enquiry->enquirySubject as $value)
                                                                <tr>
                                                                    <td>{{ $value->subject->name }}</td>
                                                                    <td>{{ $value->board ? $value->board->name : '-' }}
                                                                    </td>
                                                                    <td>{{ $value->paper ? $value->paper->name : '-' }}
                                                                    </td>
                                                                    <td>{{ $value->scienceType ? $value->scienceType->name : '-' }}
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden" value="{{ $value->id }}"
                                                                            class="id">
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

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="submit" class="btn btn-light">Cencel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script></script>
@endsection
