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
                                            No</span> <strong
                                            class="text-muted">{{ $invoice->student->currentRollNo() }}</strong></li>
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
                                            Bank
                                            Balance</span> <strong class="text-muted">£<span
                                                id="changePrice-bank">{{ auth()->user()->priceFormat($invoice->student->bank_balance) }}</span>
                                            <input type="checkbox" name="" id="bank-balance-add" id=""
                                                {{ $invoice->student->bank_balance <= 0 && $invoice->amount > 0 ? 'disabled' : '' }}>
                                        </strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Student
                                            Cash
                                            Balance</span> <strong class="text-muted">£<span
                                                id="changePrice-cash">{{ auth()->user()->priceFormat($invoice->student->cash_balance) }}</span>
                                            <input type="checkbox" name="" id="cash-balance-add" id=""
                                                {{ $invoice->student->cash_balance <= 0 && $invoice->amount > 0 ? 'disabled' : '' }}>
                                        </strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Student
                                            Credit Note</span> <strong class="text-muted">£<span
                                                id="credit-note-html">{{ auth()->user()->priceFormat($invoice->student->credit_note) }}</span>
                                            <input type="checkbox" name="" id="credit-note-add" id=""
                                                {{ $invoice->student->credit_note <= 0 && $invoice->amount > 0 ? 'disabled' : '' }}>
                                        </strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Student
                                            Deposit</span> <strong class="text-muted">£<span
                                                id="deposit-html">{{ $invoice->student->depositInvoice()->depositRefunded() }}</span>
                                            <input type="checkbox" name="" id="deposit-add" id=""
                                                {{ $invoice->student->depositInvoice()->depositRefunded() <= 0 && $invoice->amount > 0 ? 'disabled' : '' }}>
                                        </strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            #</span> <strong class="text-muted"><a
                                                href="{{ route('invoice.show', $invoice->student->id) }}">{{ $invoice->code }}</a></strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            Type</span> <strong class="text-muted">{{ $invoice->type }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Vat
                                            Inclusive Tax %</span> <strong
                                            class="text-muted">{{ auth()->user()->priceFormat($invoice->tax) }}%</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            Amount</span> <strong
                                            class="text-muted">£{{ auth()->user()->priceFormat($invoice->amount) }}</strong>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Invoice
                                            Remaining </span> <strong
                                            class="text-muted">£{{ auth()->user()->priceFormat($invoice->remainingAmount()) }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Paid
                                            Amount </span> <strong
                                            class="text-muted">£{{ auth()->user()->priceFormat($invoice->paidAmount()) }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Tax
                                            Amount </span> <strong
                                            class="text-muted">£{{ auth()->user()->priceFormat($invoice->taxAmount()) }}</strong>
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

                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-personal-info pt-4">
                                                {{-- <h4 class="text-primary mb-4">Personal Information</h4> --}}
                                                <form action="{{ route('receipt.store') }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="hidden" name="" id="credit-note-amount"
                                                            value="{{ $invoice->student->credit_note }}">
                                                        <input type="hidden" name="credit_note" id="credit-note-check"
                                                            value="0">
                                                        <input type="hidden" name="deposit" id="deposit-check"
                                                            value="0">
                                                        <input type="hidden"
                                                            value="{{ $invoice->student->bank_balance }}" name=""
                                                            disabled id="bank-balance">
                                                        <input type="hidden"
                                                            value="{{ $invoice->student->cash_balance }}" name=""
                                                            disabled id="cash-balance">
                                                        <input type="hidden"
                                                            value="{{ auth()->user()->priceFormat($invoice->student->depositInvoice()->depositRefunded()) }}"
                                                            name="" disabled id="deposit">
                                                        {{-- <input type="hidden" name="" id=""> --}}
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Balance To Pay</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="text"
                                                                        value="{{ $invoice->remainingAmount() }}"
                                                                        id="total" class="form-control pay_amount"
                                                                        placeholder="" readonly>
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
                                                                    <input type="number" step="0.01"
                                                                        class="form-control" id="discount"
                                                                        name="discount" value="0" placeholder=""
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
                                                                    <input type="number" step="0.01"
                                                                        class="form-control" id="late_fee"
                                                                        name="late_fee" value="0"
                                                                        {{ $invoice->type == 'Refundable' || $invoice->type == 'Registration' ? 'readonly' : 'required' }}
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Add To Wallet</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    <input type="number" step="0.01"
                                                                        class="form-control" id="add-to-wallet"
                                                                        name="add_to_wallet" value="0"
                                                                        placeholder=""
                                                                        {{ $invoice->remainingAmount() <= 0 ? 'readonly' : '' }}>
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
                                                                        class="form-control"
                                                                        value="{{ \Carbon\Carbon::now()->toDateString() }}"
                                                                        name="date" placeholder="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <input type="hidden" name="invoice_id"
                                                                value="{{ $invoice->id }}">
                                                            <div class="form-group">
                                                                <label class="form-label">Receiving Amount</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">£</div>
                                                                    </div>
                                                                    {{-- @dd($invoice->receipt->sum('amount') - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee'))) --}}
                                                                    <input type="hidden" class="form-control"
                                                                        id="actual_amount"
                                                                        value="{{ $invoice->amount - ($invoice->receipt->sum('discount') - $invoice->receipt->sum('late_fee')) - $invoice->receipt->sum('amount') }}">
                                                                    <input type="number" step="0.01"
                                                                        class="form-control pay_amount" id=""
                                                                        value="{{ $invoice->remainingAmount() }}"
                                                                        max="{{ $invoice->remainingAmount() }}"
                                                                        name="amount" required
                                                                        {{ $invoice->remainingAmount() <= 0 ? 'readonly' : '' }}>
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
                                                                    <select name="mode" id="mode"
                                                                        class="form-control">
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="Bank">Bank</option>
                                                                        <option value="Cash_Wallet">Cash Wallet</option>
                                                                        <option value="Bank_Wallet">Bank Wallet</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-lg-12 col-md-12 col-sm-12 pt-2 pb-5 justify-content-center d-flex">
                                                            <div class="pr-2">

                                                                <button type="submit"
                                                                    {{ $invoice->remainingAmount() <= 0 ? 'disabled' : '' }}
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                            <a href="{{ route('invoice.show', $invoice->student->id) }}"
                                                                class="btn btn-light">Cancel</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <hr class="text-bold">
                                            <div class="row pt-5">
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
                                                            <input type="text"
                                                                value="{{ $invoice->remainingAmount() }}" id="total"
                                                                class="form-control pay_amount" placeholder="" readonly>
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
                                                    <table id="example5" class="display">
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
                                                                    <td colspan="7" class="text-center">No Data
                                                                        Available </td>
                                                                </tr>
                                                            @endforelse
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

            </div>
        </div>
    @endsection
