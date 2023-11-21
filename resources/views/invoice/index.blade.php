@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Generate Invoice</h4>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-3 col-xxl-4 col-lg-4 " style=" {{ request()->all() ? 'display: none;' : '' }}"
                    id="profile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="text-center p-3 overlay-box"
                                    style="background-image: url(images/big/img1.jpg);">
                                    <div class="profile-photo">
                                        <img src="{{ asset('images/1.jpg') }}" width="100" height="100" id="p_image"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white" id="p_name">
                                    </h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Roll
                                            No</span> <strong class="text-muted" id="p_roll"></strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Year</span> <strong id="p_year" class="text-muted">
                                        </strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Payment</span> <strong id="payment"
                                            class="text-muted"></strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Branch</span> <strong id="p_branch" class="text-muted"></strong>
                                    </li>
                                    {{-- <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Balance</span> <strong class="text-muted">0</strong></li> --}}

                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Tax
                                            %</span> <strong class="text-muted"><span id="tax"></span>%</strong>
                                    </li>
                                </ul>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-block">
                                    <h4 class="card-title">Address </h4>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8 col-lg-8 {{ request()->all() ? 'col-xl-12 col-xxl-12 col-lg-12' : '' }}"
                    id="widget">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        {{-- <li class="nav-item"><a href="#about-me" data-toggle="tab" id=""
                                                class="nav-link active show individual">Individual Invoice</a></li> --}}
                                        <li class="nav-item"><a href="#additional" data-toggle="tab"
                                                class="nav-link {{ !request()->all() ? 'show active' : '' }} individual">Additional
                                                Invoice</a></li>
                                        <li class="nav-item"><a href="#receipt-list" data-toggle="tab"
                                                class="nav-link general {{ request()->all() ? 'show active' : '' }}">Bulk
                                                Invoice</a></li>

                                    </ul>
                                    <div class="tab-content">
                                        <div id="additional"
                                            class="tab-pane fade {{ !request()->all() ? 'show active' : '' }} ">
                                            <div class="profile-personal-info pt-4">
                                                {{-- <h4 class="text-primary mb-4">Personal Information</h4> --}}
                                                <form action="{{ route('invoice.store') }}" method="post">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Branch</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="branch" id="branch_id"
                                                                        class="form-control" required>
                                                                        <option value="">-</option>
                                                                        @foreach ($branch as $value)
                                                                            <option value="{{ $value->id }}">
                                                                                {{ $value->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Key Stage</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="key_stage_id" id=""
                                                                        class="form-control keyStage" required>
                                                                        <option value="">-</option>
                                                                        @foreach ($keyStage as $value)
                                                                            <option value="{{ $value->id }}">
                                                                                {{ $value->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Year</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="branch" class="form-control year_student"
                                                                        required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Student</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="student_id" class="form-control student"
                                                                        required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">From Date</label>
                                                                <div class="input-group mb-2">
                                                                    <input type="date" class="form-control"
                                                                        id="discount" name="from_date" placeholder=""
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">To Date</label>
                                                                <div class="input-group mb-2">

                                                                    <input type="date" class="form-control"
                                                                        id="late_fee" name="to_date" placeholder=""
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12" style="">
                                                            <div class="card">
                                                                <div class="card-body ">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Subject</label>

                                                                                <select class="form-control subject"
                                                                                    name="" required>



                                                                                </select>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-3">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Hours</label>

                                                                                <input type="number" name=""
                                                                                    id="hours"
                                                                                    class="form-control hours" required>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-3">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Rate</label>

                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">£
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="text"
                                                                                        class="form-control rate"
                                                                                        id="rate" value=""
                                                                                        name="" required>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Amount</label>

                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">£
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="text"
                                                                                        class="form-control "
                                                                                        id="amount" value=""
                                                                                        name="" required>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-group pt-4">

                                                                                <label class="form-label"></label>
                                                                                <span
                                                                                    class="btn btn-primary addition-subject "
                                                                                    id="">+
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="">
                                                                        <table id="" class="display"
                                                                            style="width:100%;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Subject</th>
                                                                                    <th>Hour</th>
                                                                                    <th>Rate</th>
                                                                                    <th>Amount</th>


                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id=""
                                                                                class="addition-subject-add">

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">Generate</button>
                                                            {{-- <button type="submit" class="btn btn-light">Cencel</button> --}}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

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
                                        {{-- All  --}}
                                        <div id="receipt-list"
                                            class="tab-pane fade  {{ request()->all() ? 'show active' : '' }}">
                                            <div class="profile-personal-info pt-4">
                                                <form action="{{ route('invoice.index') }}" method="get">

                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Branch</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="branch_id" id="branch_id"
                                                                        class="form-control">
                                                                        <option value="0">All</option>
                                                                        @foreach ($branch as $value)
                                                                            <option value="{{ $value->id }}"
                                                                                {{ request()->branch_id == $value->id ? 'selected' : '' }}>
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
                                                                    <select name="year_id" id="year"
                                                                        class="form-control">
                                                                        <option value="0">All</option>
                                                                        @foreach ($year as $value)
                                                                            <option value="{{ $value->id }}"
                                                                                {{ request()->year_id == $value->id ? 'selected' : '' }}>
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
                                                                    <select name="payment_period" id=""
                                                                        class="form-control payment">
                                                                        {{-- <option value="0">All</option> --}}
                                                                        <option value="Weekly"
                                                                            {{ request()->payment_period == 'Weekly' ? 'selected' : '' }}>
                                                                            Weekly</option>
                                                                        <option value="Monthly"
                                                                            {{ request()->payment_period == 'Monthly' ? 'selected' : '' }}>
                                                                            Monthly</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div
                                                            class="col-lg-12 col-md-6 col-sm-12 pt-4 justify-content-center d-flex pb-4">
                                                            <button type="submit" class="btn btn-primary">Show</button>

                                                            {{-- <button type="submit" class="btn btn-light">Cencel</button> --}}
                                                        </div>

                                                    </div>
                                                </form>


                                            </div>
                                            <form action="{{ route('group.invoice') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="row tab-content">
                                                            <div id="list-view"
                                                                class="tab-pane fade active show col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Student </h4>
                                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">From Date</label>
                                                                                <div class="input-group mb-2">
                                                                                    <input type="text"
                                                                                        class="form-control start_date"
                                                                                        name="from_date" placeholder=""
                                                                                        value="{{ request()->from_date }}"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">To Date</label>
                                                                                <div class="input-group mb-2">

                                                                                    <input type="text"
                                                                                        class="form-control end_date"
                                                                                        name="to_date" placeholder=""
                                                                                        value="{{ request()->to_date }}"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Generate
                                                                            Invoice</button>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                            <table id="example5" class="display"
                                                                                style="min-width: 845px">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th><input type="checkbox"
                                                                                                name=""
                                                                                                id="check_all">
                                                                                        </th>
                                                                                        <th>Roll</th>
                                                                                        <th>Name</th>
                                                                                        <th>Year</th>
                                                                                        <th>Branch</th>
                                                                                        <th>Fee</th>
                                                                                        <th>Invoice</th>
                                                                                        {{-- <th>Action</th> --}}
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($student as $key => $value)
                                                                                        <tr>
                                                                                            <td><input type="checkbox"
                                                                                                    name="student[]"
                                                                                                    value="{{ $value->id }}"
                                                                                                    id=""
                                                                                                    class="checkbox">
                                                                                            </td>
                                                                                            <td>{{ $value->id }}
                                                                                            </td>
                                                                                            <td>{{ $value->first_name }}
                                                                                                {{ $value->last_name }}
                                                                                            </td>
                                                                                            <td>{{ $value->year->name }}
                                                                                            </td>
                                                                                            <td>{{ $value->branch->name }}
                                                                                            </td>
                                                                                            <td>{{ $value->payment_period == 'Monthly'? (str_contains('11', $value->year->name)? auth()->user()->priceFormat(($value->fee * 49) / 12 - $value->fee_discount): auth()->user()->priceFormat(($value->fee * 52) / 12 - $value->fee_discount)): $value->fee - $value->fee_discount }}
                                                                                            </td>
                                                                                            <td>
                                                                                                <a class="btn btn-primary"
                                                                                                    href="{{ route('invoice.show', $value->id) }}">Invoice</a>
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
                                            </form>

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
