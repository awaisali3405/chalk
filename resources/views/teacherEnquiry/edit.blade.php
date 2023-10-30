@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Expense </h4>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <form action="{{ route('enquiryTeacher.update', $enquiry->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-6">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Teacher Enquiry</h5>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Branch</label>
                                                    <select name="branch_id" class="form-control" id="" required>
                                                        <option value="" selected disabled>Select Branch</option>
                                                        @foreach ($branch as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ $enquiry->branch_id == $value->id ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Department</label>
                                                    <select name="department_id" class="form-control" id=""
                                                        required>
                                                        <option value="" selected disabled>Select Department</option>
                                                        @foreach ($department as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ $enquiry->department_id == $value->id ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
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
                                                    <input type="date" name="dob" id="" class="form-control"
                                                        value="{{ $enquiry->dob }}" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Designation</label>
                                                    <input type="text" class="form-control" name="designation"
                                                        value="{{ $enquiry->designation }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">National Insurance Number</label>
                                                    <input type="text" name="national_insurance_number" id=""
                                                        value="{{ $enquiry->national_insurance_number }}"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile</label>
                                                    <input type="text" class="form-control" name="mobile"
                                                        value="{{ $enquiry->mobile }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Day Time Phone</label>
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ $enquiry->phone }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Home Telephone</label>
                                                    <input type="text" class="form-control" name="home_telephone"
                                                        value="{{ $enquiry->home_telephone }}" required>
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
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address"
                                                        value="{{ $enquiry->address }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Postal Code</label>
                                                    <input type="text" class="form-control" name="postal_code"
                                                        value="{{ $enquiry->postal_code }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Pic</label>
                                                    <input type="file" class="form-control" name="pic" required>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="{{ route('enquiryTeacher.index') }}"
                                                    class="btn btn-light">Cencel</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">Enquiry Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Year</label>
                                                    <select name="year_id" id="year" class="form-control year"
                                                        required>
                                                        <option value="">-</option>
                                                        @foreach ($year as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ $value->id == $enquiry->year_id ? 'selected' : '' }}>
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="hr-lines">Subject Detail</h4>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Subject</label>
                                                            <select name="" id=""
                                                                class="form-control  subject">

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 p-4">
                                                        <span class="btn btn-primary teacher-subject-add">+</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 table-responsive">
                                                <table id="" class="display dataTable " style="width: 100%;">
                                                    <thead>
                                                        <tr>

                                                            <th>
                                                                Subject
                                                            </th>
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="teacher_subject">
                                                        @foreach ($enquiry->subject as $value)
                                                            <tr>
                                                                <input type="hidden" name="subject[]"
                                                                    value="{{ $value->subject_id }}">
                                                                <td>{{ $value->subject->name }}</td>
                                                                <td><span
                                                                        class="btn btn-primary delete-teacher-subject">x</span>
                                                                </td>
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
                        <div class="card">
                            <div class="card-header">
                                <h3>Document </h3>

                            </div>
                            <div class="card-body table-responsive">
                                <table class=" dataTable">
                                    <thead>

                                        <tr>

                                            <th>Document</th>
                                            <th>Files</th>
                                            <th>Expiry Date</th>
                                            <th>Check List</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h4>CV</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="cv_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="cv_check" id=""
                                                    {{ $enquiry->cv_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->cv_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>DBS</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="dbs_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="dbs_check" id=""
                                                    {{ $enquiry->dbs_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->dbs_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Passport</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="password_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td>
                                                <input type="date" name="password_date" id=""
                                                    class="form-control" value="{{ $enquiry->password_date }}">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="password_check" id=""
                                                    {{ $enquiry->password_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->password_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Visa</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="visa_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td>
                                                <input type="date" name="visa_date" id=""
                                                    value="{{ $enquiry->visa_date }}" class="form-control">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="visa_check" id=""
                                                    {{ $enquiry->visa_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->visa_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>N1 Document</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="n1_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="checkbox" name="n1_check" id=""
                                                    {{ $enquiry->n1_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->n1_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Education</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="document_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="document_check" id=""
                                                    {{ $enquiry->document_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->document_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Refrence</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="refrence_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="document_check" id=""
                                                    {{ $enquiry->document_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->refrence_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Address Documents</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="address_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="address_check" id=""
                                                    {{ $enquiry->address_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->address_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>H & S Documents</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="hs_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="hs_check" id=""
                                                    {{ $enquiry->hs_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->hs_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Application Form</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="application_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="application_check" id=""
                                                    {{ $enquiry->application_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->application_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Work Availability Form</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="work_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="work_check" id=""
                                                    {{ $enquiry->work_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->work_document) }}" target="blank"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Rules & Respobisilities</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="rule_responsibility_document"
                                                    class="form-control" id="">
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="rule_responsibility_check" id=""
                                                    {{ $enquiry->rule_responsibility_check ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ asset($enquiry->rule_responsibility_document) }}"
                                                    target="blank"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
