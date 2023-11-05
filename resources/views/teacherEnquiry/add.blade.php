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
                    <form action="{{ route('enquiryTeacher.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
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
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

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
                                                    <label class="form-label">Date of Birth</label>
                                                    <input type="date" name="dob" id="" class="form-control"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Designation</label>
                                                    <input type="text" class="form-control" name="designation" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">National Insurance Number</label>
                                                    <input type="text" name="national_insurance_number" id=""
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile</label>
                                                    <input type="text" class="form-control" name="mobile" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Day Time Phone</label>
                                                    <input type="text" class="form-control" name="phone" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Home Telephone</label>
                                                    <input type="text" class="form-control" name="home_telephone"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Postal Code</label>
                                                    <input type="text" class="form-control" name="postal_code" required>
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
                                                            <option value="{{ $value->id }}">{{ $value->name }}
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
                                                <input type="checkbox" name="cv_check" id="">
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
                                                <input type="checkbox" name="dbs_check" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Passport</h4>
                                            </td>
                                            <td>
                                                <input type="file" name="passport_document" class="form-control"
                                                    id="">
                                            </td>
                                            <td>
                                                <input type="date" name="passport_date" id=""
                                                    class="form-control">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="passport_check" id="">
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
                                                    class="form-control">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="visa_check" id="">
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
                                                <input type="checkbox" name="n1_check" id="">
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
                                                <input type="checkbox" name="document_check" id="">
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
                                                <input type="checkbox" name="refrence_check" id="">
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
                                                <input type="checkbox" name="address_check" id="">
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
                                                <input type="checkbox" name="hs_check" id="">
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
                                                <input type="checkbox" name="application_check" id="">
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
                                                <input type="checkbox" name="work_check" id="">
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
                                                <input type="checkbox" name="rule_responsibility_check" id="">
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