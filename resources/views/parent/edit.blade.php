@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Edit Parent</h4>
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
                            <h5 class="card-title">Personal Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('parent.update', $parent->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mr./Mrs./Ms./Other</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('first_name', $parent->first_name) }}" name="first_name"
                                                required>
                                            @error('first_name')
                                                <span style="color:#ff3d71">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Family Name</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('last_name', $parent->last_name) }}" name="last_name"
                                                required>
                                            @error('last_name')
                                                <span style="color:#ff3d71">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <div class="row">
                                                <div class="col-4">

                                                    <div class="form-check">

                                                        <input type="radio" class="form-check-input" id="male"
                                                            value="male" name="gender"
                                                            {{ $parent->gender == 'male' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="male">Male</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check">

                                                        <input type="radio" class="form-check-input" id="female"
                                                            value="female" name="gender"
                                                            {{ $parent->gender == 'female' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="female">Female</label>
                                                    </div>

                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check">

                                                        <input type="radio" class="form-check-input" id="other"
                                                            value="other" name="gender"
                                                            {{ $parent->gender == 'other' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="other">Other</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <div class="row">
                                                <div class="col-4">

                                                    <input type="radio" class="form-control" id="male" value="male"
                                                        name="gender" >
                                                    <label for="male">Male</label>
                                                </div>
                                                <div class="col-4">
                                                    <input type="radio" class="form-control" id="female" value="female"
                                                        name="gender" {{ $parent->gender == 'female' ? 'checked' : '' }}>
                                                    <label for="female">Female</label>

                                                </div>
                                                <div class="col-4">
                                                    <input type="radio" class="form-control" id="other" value="other"
                                                        name="gender" {{ $parent->gender == 'other' ? 'checked' : '' }}>
                                                    <label for="other">Other</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Relationship to Student</label>

                                            <input type="text" list="parent"
                                                value="{{ old('relationship', $parent->relationship) }}"
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
                                            <input type="text" class="form-control"
                                                value="{{ old('emp_status', $parent->emp_status) }}" name="emp_status">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('company_name', $parent->company_name) }}"
                                                name="company_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Work Phone Number</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('work_phone_number', $parent->work_phone_number) }}"
                                                name="work_phone_number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('mobile_number', $parent->mobile_number) }}"
                                                name="mobile_number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email Address
                                            </label>
                                            <input type="text" class="form-control"
                                                value="{{ old('email', $parent->email) }}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mailing Address </label>
                                            <input type="text" class="form-control"
                                                value="{{ old('mail_address', $parent->mail_address) }}"
                                                name="mail_address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Resdential Adress </label>
                                            <input type="text" class="form-control"
                                                value="{{ old('res_address', $parent->res_address) }}"
                                                name="res_address">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('paper.index') }}" class="btn btn-light">Cencel</a>
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
