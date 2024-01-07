@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Basic Info</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('enquiryTeacher.upload.store', $teacherEnquiry->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Document Name</label>


                                            <select class="form-control" name="document_name" required>
                                                <option value="">-</option>
                                                @foreach (auth()->user()->uploadDocument() as $value)
                                                
                                                    <option value="{{ $value->name }}">{{ $value->name }}</option>
                                                @endforeach

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">File</label>



                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file"
                                                    name="file" onchange="upload_check()" required>
                                                <label class="custom-file-label">Choose file</label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Expiry Date</label>



                                            <input type="date" max="{{ auth()->user()->session()->end_date }}"
                                                min="{{ auth()->user()->session()->start_date }}" class="form-control"
                                                name="enquiry_date">
                                            {{-- <div class="custom-file">

                                            </div> --}}


                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="submit" class="btn btn-light">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item pt-2 pr-3"><a href="#all" data-toggle="tab"
                                class="nav-link btn-primary mr-1 show active">All</a></li>
                        @foreach (auth()->user()->uploadDocument() as $value)
                            <li class="nav-item pr-3 pt-2"><a href="#tab{{ $value->id }}" data-toggle="tab"
                                    class="nav-link btn-primary">{{ $value->name }}</a></li>
                        @endforeach

                    </ul>
                    <div class="row tab-content">
                        <div id="all" class="tab-pane fade active show col-lg-12">
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
                                                    <th>Expiry Date</th>


                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($teacherEnquiry->upload as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>

                                                        <td>{{ $value->document_name }}</td>
                                                        <td>{{ $value->enquiry_date }}</td>


                                                        <td>

                                                            <a href="{{ route('enquiry.upload.delete', $value->id) }}"
                                                                title="note" class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a>

                                                            <a href="{{ asset($value->file_name) }}" title=""
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
                        @foreach (auth()->user()->uploadDocument() as $value)
                            <div id="tab{{ $value->id }}" class="tab-pane fade  col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        {{ $value->name }}
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example5" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>Sr</th>
                                                        <th>Document</th>
                                                        <th>Expiry Date</th>


                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($teacherEnquiry->upload()->where('document_name', $value->name)->get() as $value)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>

                                                            <td>{{ $value->document_name }}</td>
                                                            <td>{{ $value->enquiry_date }}</td>


                                                            <td>

                                                                <a href="{{ route('enquiry.upload.delete', $value->id) }}"
                                                                    title="note" class="btn btn-sm btn-danger"><i
                                                                        class="la la-trash-o"></i></a>

                                                                <a href="{{ asset($value->file_name) }}" title=""
                                                                    target="_blank"
                                                                    class="btn btn-sm btn-primary">Download</a>
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
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
