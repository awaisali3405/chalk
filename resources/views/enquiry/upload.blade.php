@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Upload Document</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('enquiry.upload.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Document Name</label>
                                            <input type="hidden" name="enquiry_id" value="{{ $enquiry->id }}">


                                            <select class="form-control" name="document_name">

                                                {{-- <option value="Student Admission Form">Student Admission Form</option> --}}
                                                <option value="Discussion Page">Discussion Page</option>
                                                {{-- <option value="Addresss proof">Addresss proof</option> --}}
                                                <option value="Student Assessment">Student Assessment</option>
                                                <option value="Other">Other</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Document Name</label>



                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file"
                                                    name="file" onchange="upload_check()" required>
                                                <label class="custom-file-label">Choose file</label>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('enquiry.index') }}" class="btn btn-light">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Document</th>
                                                    <th>File</th>


                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($enquiry->upload as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>

                                                        <td>{{ $value->document_name }}</td>
                                                        <td>{{ $value->file_name }}</td>


                                                        <td>

                                                            <a href="{{ route('enquiry.upload.delete', $value->id) }}"
                                                                title="note" class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a>

                                                            <a href="{{ asset($value->file) }}" title=""
                                                                target="_blank" class="btn btn-sm btn-primary">Download</a>
                                                            {{-- <a href="{{ route('branch.show', $value->id) }}"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="grid-view" class="tab-pane fade col-lg-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="card card-profile">
                                        <div class="card-header justify-content-end pb-0">
                                            <div class="dropdown">
                                                <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                    <span class="dropdown-dots fs--1"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="images/profile/small/pic2.jpg" width="100"
                                                        class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h3 class="my-4">Alexander</h3>
                                                <ul class="list-group mb-3 list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Designation :</span><strong>Clerk</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Phone No. :</span><strong>+01 123 456
                                                            7890</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Address:</span><strong>#8901 Marmora
                                                            Road</strong>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                    href="staff-profile.html">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="card card-profile">
                                        <div class="card-header justify-content-end pb-0">
                                            <div class="dropdown">
                                                <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                    <span class="dropdown-dots fs--1"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="images/profile/small/pic3.jpg" width="100"
                                                        class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h3 class="my-4">Elizabeth</h3>
                                                <ul class="list-group mb-3 list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Designation :</span><strong>Librarian</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Phone No. :</span><strong>+01 123 456
                                                            7890</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Address:</span><strong>#8901 Marmora
                                                            Road</strong>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                    href="staff-profile.html">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="card card-profile">
                                        <div class="card-header justify-content-end pb-0">
                                            <div class="dropdown">
                                                <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                    <span class="dropdown-dots fs--1"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="images/profile/small/pic4.jpg" width="100"
                                                        class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h3 class="my-4">Amelia</h3>
                                                <ul class="list-group mb-3 list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Designation :</span><strong>Clerk</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Phone No. :</span><strong>+01 123 456
                                                            7890</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Address:</span><strong>#8901 Marmora
                                                            Road</strong>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                    href="staff-profile.html">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="card card-profile">
                                        <div class="card-header justify-content-end pb-0">
                                            <div class="dropdown">
                                                <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                    <span class="dropdown-dots fs--1"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="images/profile/small/pic5.jpg" width="100"
                                                        class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h3 class="my-4">Charlotte</h3>
                                                <ul class="list-group mb-3 list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Designation :</span><strong>Librarian</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Phone No. :</span><strong>+01 123 456
                                                            7890</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Address:</span><strong>#8901 Marmora
                                                            Road</strong>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                    href="staff-profile.html">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="card card-profile">
                                        <div class="card-header justify-content-end pb-0">
                                            <div class="dropdown">
                                                <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                    <span class="dropdown-dots fs--1"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="images/profile/small/pic6.jpg" width="100"
                                                        class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h3 class="my-4">Isabella</h3>
                                                <ul class="list-group mb-3 list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Designation :</span><strong>Librarian</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Phone No. :</span><strong>+01 123 456
                                                            7890</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Address:</span><strong>#8901 Marmora
                                                            Road</strong>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                    href="staff-profile.html">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="card card-profile">
                                        <div class="card-header justify-content-end pb-0">
                                            <div class="dropdown">
                                                <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                    <span class="dropdown-dots fs--1"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="images/profile/small/pic7.jpg" width="100"
                                                        class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h3 class="my-4">Sebastian</h3>
                                                <ul class="list-group mb-3 list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Designation :</span><strong>Clerk</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Phone No. :</span><strong>+01 123 456
                                                            7890</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Address:</span><strong>#8901 Marmora
                                                            Road</strong>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                    href="staff-profile.html">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="card card-profile">
                                        <div class="card-header justify-content-end pb-0">
                                            <div class="dropdown">
                                                <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                    <span class="dropdown-dots fs--1"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="images/profile/small/pic8.jpg" width="100"
                                                        class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h3 class="my-4">Olivia</h3>
                                                <ul class="list-group mb-3 list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Designation :</span><strong>Sales
                                                            Assistant</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Phone No. :</span><strong>+01 123 456
                                                            7890</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Address:</span><strong>#8901 Marmora
                                                            Road</strong>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                    href="staff-profile.html">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="card card-profile">
                                        <div class="card-header justify-content-end pb-0">
                                            <div class="dropdown">
                                                <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                    <span class="dropdown-dots fs--1"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="images/profile/small/pic9.jpg" width="100"
                                                        class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h3 class="my-4">Emma</h3>
                                                <ul class="list-group mb-3 list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Designation :</span><strong>Clerk</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Phone No. :</span><strong>+01 123 456
                                                            7890</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Address:</span><strong>#8901 Marmora
                                                            Road</strong>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                    href="staff-profile.html">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="card card-profile">
                                        <div class="card-header justify-content-end pb-0">
                                            <div class="dropdown">
                                                <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                    <span class="dropdown-dots fs--1"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <img src="images/profile/small/pic10.jpg" width="100"
                                                        class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h3 class="my-4">Jackson</h3>
                                                <ul class="list-group mb-3 list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Designation :</span><strong>Clerk</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Phone No. :</span><strong>+01 123 456
                                                            7890</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                                        <span class="mb-0">Address:</span><strong>#8901 Marmora
                                                            Road</strong>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                    href="staff-profile.html">Read More</a>
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
    </div>
@endsection
