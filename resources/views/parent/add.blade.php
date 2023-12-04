@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Parent</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Parent</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Parent</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Parent Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('parent.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mr./Mrs./Ms./Other *</label>
                                            <input type="text" class="form-control" value="{{ old('first_name') }}"
                                                name="first_name" required>
                                            @error('first_name')
                                                <span style="color:#ff3d71">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" class="form-control" value="{{ old('last_name') }}"
                                                name="last_name" required>
                                            @error('last_name')
                                                <span style="color:#ff3d71">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" value="{{ old('given_name') }}"
                                                name="given_name" required>
                                            @error('given_name')
                                                <span style="color:#ff3d71">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Gender *</label>
                                            <div class="row">
                                                <div class="col-4">

                                                    <div class="form-check">

                                                        <input type="radio" class="form-check-input" id="male"
                                                            value="male" name="gender" checked>
                                                        <label class="form-check-label" for="male">Male</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check">

                                                        <input type="radio" class="form-check-input" id="female"
                                                            value="female" name="gender">
                                                        <label class="form-check-label" for="female">Female</label>
                                                    </div>

                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check">

                                                        <input type="radio" class="form-check-input" id="other"
                                                            value="other" name="gender">
                                                        <label class="form-check-label" for="other">Other</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Relationship to Student *</label>

                                            <input type="text" list="parent" value="{{ old('relationship') }}"
                                                class="form-control" name="relationship" required>
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
                                            <input type="text" class="form-control" value="{{ old('emp_status') }}"
                                                name="emp_status">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" class="form-control" value="{{ old('company_name') }}"
                                                name="company_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Work Phone Number</label>
                                            <input type="text" class="form-control" name="work_phone_number"
                                                value="{{ old('work_phone_number') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mobile Number *</label>
                                            <input type="text"
                                                class="form-control @error('mobile_number') is-invalid @enderror""
                                                name="mobile_number" value="{{ old('mobile_number') }}" required>
                                            @error('mobile_number')
                                                <span style="color:#ff3d71" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email Address *
                                            </label>
                                            <input type="text" class="form-control"
                                                @error('email') is-invalid @enderror" value="" name="email"
                                                required>
                                            @error('email')
                                                <span style="color:#ff3d71" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">First Address *</label>
                                            <input type="text" id="formatted_address_0" class="form-control"
                                                value="{{ old('formatted_address_0') }}" name="res_address" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Second Address Line </label>
                                            <input type="text" id="formatted_address_1" class="form-control"
                                                value="{{ old('res_second_address') }}" name="res_second_address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Third Address Line</label>
                                            <input type="text" id="formatted_address_2" class="form-control"
                                                value="{{ old('res_third_address') }}" name="res_third_address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Town</label>
                                            <input type="text" id="town_or_city" class="form-control" name="res_town"
                                                value="{{ old('res_town') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Country </label>
                                            <input type="text" id="county" class="form-control"
                                                value="{{ old('postcode') }}" name="res_country">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Postcode</label>
                                            <input type="text" id="postcode" class="form-control"
                                                value="{{ old('postcode') }}" name="res_postal_code">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Password </label>
                                            <input type="text" class="form-control" name="password">
                                        </div>
                                    </div>



                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('parent.index') }}" class="btn btn-light">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
