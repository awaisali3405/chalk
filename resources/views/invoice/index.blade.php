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
                                        <li class="nav-item"><a href="#additional-book" data-toggle="tab"
                                                class="nav-link">Additional Book Invoice</a></li>
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
                                                                    <select name="branch"
                                                                        class="form-control year_student_branch " required>
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
                                                                    <input type="date"
                                                                        max="{{ auth()->user()->session()->end_date }}"
                                                                        min="{{ auth()->user()->session()->start_date }}"
                                                                        class="form-control" id="discount"
                                                                        name="from_date" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">To Date</label>
                                                                <div class="input-group mb-2">

                                                                    <input type="date"
                                                                        max="{{ auth()->user()->session()->end_date }}"
                                                                        min="{{ auth()->user()->session()->start_date }}"
                                                                        class="form-control" id="late_fee"
                                                                        name="to_date" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Date</label>
                                                                <div class="input-group mb-2">

                                                                    <input type="date"
                                                                        max="{{ auth()->user()->session()->end_date }}"
                                                                        min="{{ auth()->user()->session()->start_date }}"
                                                                        class="form-control" name="date"
                                                                        placeholder="" required>
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
                                                                                    name="">



                                                                                </select>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-3">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Hours</label>

                                                                                <input type="number" name=""
                                                                                    id="hours"
                                                                                    class="form-control hours">

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
                                                                                    <input type="number"
                                                                                        class="form-control rate"
                                                                                        id="rate" value=""
                                                                                        name="">
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
                                                        <div
                                                            class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                                                            <button type="submit"
                                                                class="btn btn-primary additional-invoice-btn"
                                                                disabled>Generate</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="additional-book" class="tab-pane fade">
                                            <div class="profile-personal-info pt-4">
                                                {{-- <h4 class="text-primary mb-4">Personal Information</h4> --}}
                                                <form action="{{ route('invoice.book.store') }}" method="post">
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
                                                                    <select name="branch"
                                                                        class="form-control year_student-book year_student_branch "
                                                                        required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Student</label>
                                                                <div class="input-group mb-2">
                                                                    <select name="student_id"
                                                                        class="form-control book-student " required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">From Date</label>
                                                                <div class="input-group mb-2">
                                                                    <input type="date"
                                                                        max="{{ auth()->user()->session()->end_date }}"
                                                                        min="{{ auth()->user()->session()->start_date }}"
                                                                        class="form-control" id="discount"
                                                                        name="from_date" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">To Date</label>
                                                                <div class="input-group mb-2">

                                                                    <input type="date"
                                                                        max="{{ auth()->user()->session()->end_date }}"
                                                                        min="{{ auth()->user()->session()->start_date }}"
                                                                        class="form-control" id="late_fee"
                                                                        name="to_date" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Date</label>
                                                                <div class="input-group mb-2">
                                                                    <input type="date"
                                                                        max="{{ auth()->user()->session()->end_date }}"
                                                                        min="{{ auth()->user()->session()->start_date }}"
                                                                        class="form-control" name="date"
                                                                        placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12" style="">
                                                            <div class="card">
                                                                <div class="card-body ">
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Subject</label>

                                                                                <select class="form-control "
                                                                                    id="book-subject" name="">



                                                                                </select>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Book Name</label>

                                                                                <input type="text" name=""
                                                                                    class="form-control " id="book-name">

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Quantity</label>

                                                                                <input type="number" name=""
                                                                                    id="book-quantity"
                                                                                    class="form-control">

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Rate</label>

                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">£
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        step="0.01" id="book-rate"
                                                                                        value="" name="">
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
                                                                                        id="book-total" value=""
                                                                                        name="" readonly>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-group pt-4">

                                                                                <label class="form-label"></label>
                                                                                <span class="btn btn-primary "
                                                                                    id="additional-book-invoice-btn">+
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
                                                                                    <th>Book</th>
                                                                                    <th>Quantity</th>
                                                                                    <th>Rate</th>
                                                                                    <th>Amount</th>


                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id=""
                                                                                class="addition-book-table">

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                                                            <button type="submit"
                                                                class="btn btn-primary additional-book-invoice-generate"
                                                                disabled>Generate</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
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

                                                            {{-- <button type="submit" class="btn btn-light">Cancel</button> --}}
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
                                                                        <div class="col-lg-2 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">From Date</label>
                                                                                <div class="input-group mb-2">
                                                                                    <input type="text"
                                                                                        class="form-control start_date"
                                                                                        name="from_date" placeholder=""
                                                                                        value="{{ request()->from_date }}"
                                                                                        required readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">To Date</label>
                                                                                <div class="input-group mb-2">
                                                                                    <input type="text"
                                                                                        class="form-control end_date"
                                                                                        name="to_date" placeholder=""
                                                                                        value="{{ request()->to_date }}"
                                                                                        required readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Date</label>
                                                                                <div class="input-group mb-2">
                                                                                    <input type="date"
                                                                                        max="{{ auth()->user()->session()->end_date }}"
                                                                                        min="{{ auth()->user()->session()->start_date }}"
                                                                                        class="form-control"
                                                                                        name="date" placeholder=""
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
                                                                                            <td>{{ $value->roll_no }}
                                                                                            </td>
                                                                                            <td>{{ $value->first_name }}
                                                                                                {{ $value->last_name }}
                                                                                            </td>
                                                                                            <td>{{ $value->currentYear()->name }}
                                                                                            </td>
                                                                                            <td>{{ $value->branch->name }}
                                                                                            </td>
                                                                                            <td>£{{ $value->payment_period == 'Monthly'? (str_contains('11', $value->year->name)? auth()->user()->priceFormat(($value->fee * 49) / 12 - $value->fee_discount): auth()->user()->priceFormat(($value->fee * 52) / 12 - $value->fee_discount)): $value->fee - $value->fee_discount }}
                                                                                            </td>
                                                                                            <td>
                                                                                                <a class="btn btn-primary"
                                                                                                    href="{{ route('invoice.show', $value->id) }}">Invoice</a>
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
