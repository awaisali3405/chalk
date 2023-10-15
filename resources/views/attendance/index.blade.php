@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Academic Calender</h4>
                    </div>
                </div>

            </div>

            <div class="profile-personal-info pt-4">
                <form action="{{ route('invoice.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Branch</label>
                                <div class="input-group mb-2">
                                    <select name="branch" id="branch_id" class="form-control">
                                        <option value="0">All</option>
                                        @foreach ($branch as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Year</label>
                                <div class="input-group mb-2">
                                    <select name="branch" id="year" class="form-control">
                                        <option value="0">All</option>
                                        @foreach ($year as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Payment</label>
                                <div class="input-group mb-2">
                                    <select name="branch" id="year" class="form-control">
                                        <option value="0">All</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">From Date</label>
                                <div class="input-group mb-2">
                                    <input type="date" class="form-control" id="discount" name="from_date"
                                        placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">To Date</label>
                                <div class="input-group mb-2">

                                    <input type="date" class="form-control" id="late_fee" name="to_date" placeholder=""
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 pt-4">
                            <button type="submit" class="btn btn-primary">Apply</button>

                            {{-- <button type="submit" class="btn btn-light">Cencel</button> --}}
                        </div>

                    </div>
                </form>

                {{-- <h4 class="text-primary mb-4">Personal Information</h4> --}}

                {{-- <div class="profile-about-me">
                <div class="border-bottom-1 pb-4">
                    <p>A wonderful serenity has taken possession of my entire soul, like
                        these sweet mornings of spring which I enjoy with my whole heart. I
                        am alone, and feel the charm of existence was created for the bliss
                        of souls like mine.I am so happy, my dear friend, so absorbed in the
                        exquisite sense of mere tranquil existence, that I neglect my
                        talents.</p>
                    <p>A collection of textile samples lay spread out on the table - Samsa
                        was a travelling salesman - and above it there hung a picture that
                        he had recently cut out of an illustrated magazine and housed in a
                        nice, gilded frame.</p>
                </div>
            </div> --}}
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Student </h4>
                                    <a href="" class="btn btn-primary">Save</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="" id="check_all">
                                                    </th>
                                                    <th>Roll</th>
                                                    <th>Name</th>
                                                    <th>Year</th>
                                                    <th>Branch</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($student as $key => $value) --}}
                                                <tr>
                                                    <td><input type="checkbox" name="student[]" value=""
                                                            id="" class="checkbox">
                                                    </td>
                                                    <td>1
                                                    </td>
                                                    <td>12 </td>
                                                    <td>121212
                                                    </td>
                                                    <td>12121
                                                    </td>
                                                    {{-- <td>
                                                            <a href="{{ route('student.show', $value->id) }}"
                                                                title="upload"
                                                                class="btn btn-sm btn-info"><i
                                                                    class="la la-eye"></i></a>
                                                            <a href="{{ route('invoice.show', $value->id) }}"
                                                                title="upload"
                                                                class="btn btn-sm btn-info">Invoice</a>
                                                        </td> --}}
                                                </tr>
                                                {{-- @endforeach --}}
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
