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
                <div class="col-sm-6 p-md-0 d-flex justify-content-end">
                    <div class="welcome-text">
                        <a href="{{ route('invoice.show', $invoice->student->id) }}" class="btn btn-primary">Back</a>
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
                                        <img src="{{ asset($invoice->student->profile_pic) }}" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white">{{ $invoice->student->first_name }}
                                        {{ $invoice->student->last_name }}
                                    </h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Roll
                                            No</span> <strong class="text-muted">{{ $invoice->student->id }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Year</span> <strong
                                            class="text-muted">{{ $invoice->student->year->name }}
                                        </strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Payment</span> <strong
                                            class="text-muted">{{ $invoice->student->payment_period }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Branch</span> <strong
                                            class="text-muted">{{ $invoice->student->branch->name }}</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Student
                                            Balance</span> <strong class="text-muted">0</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            #</span> <strong class="text-muted"><a
                                                href="{{ route('invoice.show', $invoice->student->id) }}">{{ $invoice->id }}</a></strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            Type</span> <strong class="text-muted">{{ $invoice->type }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Vat
                                            Inclusive Tax %</span> <strong class="text-muted">{{ $invoice->tax }}%</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Vat
                                            Inclusive Tax </span> <strong class="text-muted">{{ $invoice->tax }}%</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            Amount</span> <strong class="text-muted">£{{ $invoice->amount }}</strong></li>

                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            Remaining </span> <strong
                                            class="text-muted">£{{ $invoice->remainingAmount() }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Paid
                                            Amount </span> <strong
                                            class="text-muted">£{{ number_format($invoice->paidAmount(), 2) }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Tax
                                            Amount </span> <strong
                                            class="text-muted">£{{ number_format($invoice->taxAmount(), 2) }}</strong>
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
                                    <p class="mb-0">{{ $invoice->student->parents[0]->address() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">

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
                                                class="nav-link active show">Add Receipt</a></li>
                                        <li class="nav-item"><a href="#receipt-list" data-toggle="tab"
                                                class="nav-link ">Receipts List</a></li>
                                        {{-- <li class="nav-item"><a href="#upload" data-toggle="tab" class="nav-link">Upload</a>
                                        </li>
                                        <li class="nav-item"><a href="#note" data-toggle="tab" class="nav-link">Notes</a>
                                        </li>
                                        <li class="nav-item"><a href="#attandence" data-toggle="tab"
                                                class="nav-link">Attendance</a></li>
                                        <li class="nav-item"><a href="#statement" data-toggle="tab"
                                                class="nav-link">Statement</a></li>
                                        <li class="nav-item"><a href="#parent" data-toggle="tab" class="nav-link">Parent
                                                Detail</a></li> --}}
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-personal-info pt-4">
                                                {{-- <h4 class="text-primary mb-4">Personal Information</h4> --}}
                                                <form action="{{ route('receipt.store') }}" method="post">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <input type="hidden" name="invoice_id"
                                                                value="{{ $invoice->id }}">
                                                            <div class="form-group">
                                                                <label class="form-label">Balance To Pay</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}
                                                                    <input type="hidden" class="form-control"
                                                                        id="actual_amount"
                                                                        value="{{ $invoice->amount - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee')) - $invoice->receipt->sum('amount') }}">
                                                                    <input type="text" class="form-control pay_amount"
                                                                        id=""
                                                                        value="{{ auth()->user()->priceFormat($invoice->amount - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee')) - $invoice->receipt->sum('amount')) }}"
                                                                        name="amount" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Discount</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        id="discount" name="discount" value="0"
                                                                        placeholder=""
                                                                        {{ $invoice->type == 'Refundable' || $invoice->type == 'Registration' ? 'readonly' : 'required' }}>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Late Fee Charge</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        id="late_fee" name="late_fee" value="0"
                                                                        {{ $invoice->type == 'Refundable' || $invoice->type == 'Registration' ? 'readonly' : 'required' }}
                                                                        placeholder="">
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
                                                                    <input type="date" class="form-control"
                                                                        name="date" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Description</label>
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
                                                            <button type="submit" class="btn btn-light">Cencel</button>
                                                        </div>
                                                    </div>
                                                </form>
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
                                                <div class="col-12 justify-content-center d-flex">
                                                    <h4>Calculator</h4>
                                                </div>
                                            </div>
                                            <div class="row pt-5">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Balance To Pay</label>
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">£</div>
                                                            </div>
                                                            <input type="text" value="{{ $invoice->totalAmount() }}"
                                                                id="" class="form-control pay_amount" placeholder=""
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Receiving Cash</label>
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">£</div>
                                                            </div>
                                                            <input type="text" value="0" id="receiving_cash"
                                                                class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Change</label>
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">£</div>
                                                            </div>
                                                            <input type="text" name="0" class="form-control"
                                                                id="change" placeholder="" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="receipt-list" class="tab-pane  ">
                                            <div class="profile-personal-info pt-4">
                                                <div class="table-responsive">
                                                    <table id="example5" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr</th>
                                                                <th>Receipt Date</th>
                                                                <th>Paid</th>
                                                                <th>Discount</th>
                                                                <th>Late Fee</th>
                                                                <th>Mode</th>

                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($invoice->receipt as $key=> $value)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                                                    <td>£{{ auth()->user()->priceFormat($value->amount) }}
                                                                    </td>
                                                                    <td>£{{ auth()->user()->priceFormat($value->discount) }}
                                                                    </td>
                                                                    <td>£{{ auth()->user()->priceFormat($value->late_fee) }}
                                                                    </td>
                                                                    <td>£{{ $value->mode }}</td>
                                                                    <td></td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="7">No Data Available </td>
                                                                </tr>
                                                            @endforelse
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
