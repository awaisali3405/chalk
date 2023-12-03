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
                                <h2>Enquiry Informatioin</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <form action="{{ route('enquiry.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Inquiring Person Name*</label>
                                            <input type="text" class="form-control" name="caller_name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Relationship*
                                            </label>
                                            <input type="text" class="form-control" name="relationship" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Student First Name*</label>
                                            <input type="text" class="form-control uppercase" name="first_name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Student Last Name*</label>
                                            <input type="text" class="form-control uppercase" name="last_name" required>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="dob" required>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email <input type="checkbox" name="email_receive"
                                                    value="1" id="">
                                                <span class="font-weight-light font-italic font">(Check if you want send
                                                    email)</span>
                                            </label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="number" class="form-control" name="phone_no">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mobile <input type="checkbox" name="message_receive"
                                                    value="1" id="">
                                                <span class="font-weight-light font-italic font">(Check if you want send
                                                    Mesage)</span>

                                            </label>
                                            <input type="number" class="form-control" name="mobile_no" required>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" required>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Current School Name</label>
                                            <input type="text" class="form-control" name="current_school_name">
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Key Stage</label>

                                            <select class="form-control keyStage" name="key_stage_id" required>
                                                <option value="">Select Key Stage</option>
                                                @foreach ($keyStage as $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Year *</label>

                                            <select class="form-control year_enquiry" name="year_id" required>
                                                <option value="">-</option>
                                                @foreach ($year as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>

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
                                            <label class="form-label">Enquiry Date *</label>
                                            <input type="date" class="form-control" name="enquiry_date" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Assessment Date</label>
                                            <input type="date" class="form-control" name="assessment_date">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Assessment Time</label>
                                            <input type="time" class="form-control" name="assessment_time">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">How do you Know About Us *</label>

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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Subjects</label>
                                        </div>
                                        <div class=" pl-3">
                                            <div class="row checkbox">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Note</label>


                                            <textarea name="note" class="summernote"></textarea>
                                        </div>
                                    </div>



                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('enquiry.index') }}" class="btn btn-light">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
