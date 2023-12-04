@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Upload Payroll</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('enquiryTeacher.payroll.store', $enquiry->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Document Name</label>


                                            <select class="form-control" name="name" required>
                                                <option value="">-</option>
                                                <option value="PayRoll">PayRoll</option>
                                                <option value="Resignation File">Resignation File</option>
                                                <option value="Increment File">Increment File</option>
                                                <option value="P60">P60</option>
                                                <option value="Other">Other</option>

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
                                            <label class="form-label">Date</label>



                                            <input type="date" class="form-control" name="date" required>
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
                                                    <th>Date</th>


                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($enquiry->payroll as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>

                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ auth()->user()->ukFormat($value->date) }}</td>


                                                        <td>

                                                            <a href="{{ route('enquiryTeacher.payroll.delete', $value->id) }}"
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
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
