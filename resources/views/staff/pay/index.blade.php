@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Receipt</h4>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-3 col-xxl-4 col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="text-center p-3 overlay-box"
                                    style="background-image: url(images/big/img1.jpg);">
                                    <div class="profile-photo">
                                        <img src="{{ asset($staff->teacherEnquiry->pic) }}" width="100px" height="100px"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white">{{ $staff->name }}
                                    </h3>
                                </div>
                                <ul class="list-group list-group-flush">


                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Payment</span> <strong
                                            class="text-muted">{{ $staff->salary_type }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Branch</span> <strong
                                            class="text-muted">{{ $staff->branch->name }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Staff
                                            {{ $staff->salary_type }}
                                            Salary</span> <strong class="text-muted">£ {{ $staff->salary }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Hours</span> <strong class="text-muted" id="hour"></strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Staff
                                            Salary Paid</span> <strong class="text-muted"></strong></li>



                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                                class="nav-link active show">Salary Pay</a></li>
                                        <li class="nav-item"><a href="#receipt-list" data-toggle="tab" class="nav-link ">Pay
                                                List</a></li>
                                        <li class="nav-item"><a href="#attendance-list" data-toggle="tab"
                                                class="nav-link ">Attendance List</a></li>

                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-personal-info pt-4">
                                                {{-- <h4 class="text-primary mb-4">Personal Information</h4> --}}
                                                <form action="{{ route('staff.pay.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" id="staff_id" name="staff_id"
                                                        value="{{ $staff->id }}">
                                                    <div class="row">
                                                        @if (!isset($invoice))
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">From Date</label>
                                                                    <div class="input-group mb-2">
                                                                        <input
                                                                            type="{{ $staff->salary_type == 'Monthly' ? 'text' : 'date' }}"
                                                                            class="form-control {{ $staff->salary_type == 'Monthly' ? 'start_date' : '' }}"
                                                                            id="from_date" name="from_date" placeholder=""
                                                                            {{ $staff->salary_type == 'Monthly' ? 'readonly' : '' }}
                                                                            max="{{ auth()->user()->session()->end_date }}"
                                                                            min="{{ auth()->user()->session()->start_date }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">To Date</label>
                                                                    <div class="input-group mb-2">
                                                                        <input
                                                                            type="{{ $staff->salary_type == 'Monthly' ? 'text' : 'date' }}"
                                                                            class="form-control {{ $staff->salary_type == 'Monthly' ? 'end_date' : '' }}"
                                                                            id="to_date" name="to_date" placeholder=""
                                                                            required
                                                                            max="{{ auth()->user()->session()->end_date }}"
                                                                            min="{{ auth()->user()->session()->start_date }}"
                                                                            {{ $staff->salary_type == 'Monthly' ? 'readonly' : '' }}>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="invoice_id"
                                                                value="{{ $invoice->id }}">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">From Date</label>
                                                                    <div class="input-group mb-2">
                                                                        <input type="text" class="form-control "
                                                                            value="{{ $invoice->from_date }}"
                                                                            id="from_date" name="from_date" placeholder=""
                                                                            required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">To Date</label>
                                                                    <div class="input-group mb-2">

                                                                        <input type="text" class="form-control"
                                                                            value="{{ $invoice->to_date }}"
                                                                            id="to_date" name="to_date" placeholder=""
                                                                            required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Salary</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ (isset($invoice) ? $invoice->amount : $staff->salary_type == 'Monthly') ? $staff->salary : 0 }}"
                                                                        id="salary" name="salary" readonly required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Deduction</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        value="0" id="deduction" name="deduction"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Tax Amount</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="0" id="tax" name="tax"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">SSP</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="0" id="ssp" name="ssp"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Employee NI</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="0" id="ni" name="ni"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">DBS</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="{{ $staff->request->sum('deduction_amount') - $staff->dbs_deduct }}"
                                                                        id="dbs" name="dbs" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Employee Pension</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="0" id="pension" name="pension"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Bonus</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="0" id="bonus" name="bonus"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Loan </label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="{{ $staff->loan->count() > 0 ? $staff->loan[0]->installment() : 0 }}"
                                                                        id="loan" name="loan" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Student Loan </label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="0" id="student_loan"
                                                                        name="student_loan" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Total</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="{{ (isset($invoice) ? $invoice->amount : $staff->salary_type == 'Monthly') ? $staff->salary : 0 }}"
                                                                        id="total" name="total" required readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Employer NI </label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="0" id="emp_ni" name="employer_ni"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Employer Pension </label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}

                                                                    <input type="text" class="form-control"
                                                                        value="0" id="emp_pension"
                                                                        name="employer_pension" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Date</label>
                                                                <div class="input-group mb-2">
                                                                    {{-- <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div> --}}
                                                                    <input type="date"
                                                                        max="{{ auth()->user()->session()->end_date }}"
                                                                        min="{{ auth()->user()->session()->start_date }}"
                                                                        class="form-control" name="date"
                                                                        placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Note</label>
                                                                <div class="input-group mb-2">
                                                                    {{-- <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div> --}}
                                                                    <input type="text" class="form-control"
                                                                        name="description" value="Amount Received By"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Mode</label>
                                                                <div class="input-group mb-2">
                                                                    {{-- <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div> --}}
                                                                    <select name="mode" id=""
                                                                        class="form-control">
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="Bank">Bank</option>
                                                                    </select>

                                                                </div>
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
                                        <div id="receipt-list" class="tab-pane  ">
                                            <div class="profile-personal-info pt-4">
                                                <div class="table-responsive">
                                                    <table id="example5" class="display">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr</th>
                                                                <th>Pay Date</th>
                                                                <th>Salary</th>
                                                                <th>Deduction</th>
                                                                <th>Total</th>
                                                                <th>Mode</th>

                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($staff->receipt as $key => $value)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                                                    <td>£{{ auth()->user()->priceFormat($value->salary) }}
                                                                    </td>
                                                                    <td>£{{ auth()->user()->priceFormat($value->deduction) }}
                                                                    </td>
                                                                    <td>£{{ auth()->user()->priceFormat($value->total) }}
                                                                    </td>
                                                                    <td>{{ $value->mode }}</td>
                                                                    <td><a href=""
                                                                            class="btn btn-primary">Print</a></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                        <div id="attendance-list" class="tab-pane  ">
                                            <div class="row pt-3">
                                                <div class="col-12 justify-content-end   d-flex">
                                                    <a href="{{ route('staff.attendance.index', $staff->id) }}"
                                                        class="btn btn-primary">Add Attendance</a>
                                                </div>
                                            </div>
                                            <div class="profile-personal-info pt-4">
                                                <div class="table-responsive">
                                                    <table id="example5" class="display">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr</th>
                                                                <th>Date</th>
                                                                <th>Period</th>
                                                                <th>Amount</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($staff->attendance as $key => $value)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                                                    <td>{{ $value->period() }}</td>
                                                                    <td>£{{ auth()->user()->priceFormat($value->amount()) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
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
