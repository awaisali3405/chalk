@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Student Invoice</h4>
                    </div>
                </div>
            </div>
            <div class="row bg-white d-flex justify-content-center">
                <div class="col-4">
                    <div class="text-center p-3 " style="">
                        <div class="profile-photo">
                            <img id="img" src="{{ asset($student->profile_pic) }}" width="100" height="100"
                                class="img-fluid rounded-circle" alt="">
                        </div>
                        <label for="upload" class="mt-3 mb-1 text-bold"> Name : {{ $student->first_name }}
                            {{ $student->last_name }} </label>
                    </div>
                </div>
                <div class="col-4">
                    <div>
                        <label for="upload" class="mt-3 mb-1 text-bold"> Roll No: {{ $student->currentRollNo() }} </label>
                    </div>
                    <div>
                        <label for="upload" class="mt-3 mb-1 text-bold"> Year
                            : {{ $student->currentYear()->name }}
                        </label>
                    </div>
                    <div>
                        <label for="upload" class="mt-3 mb-1 text-bold"> Payment : {{ $student->payment_period }}
                        </label>
                    </div>
                    <div>
                        <label for="upload" class="mt-3 mb-1 text-bold"> Branch :
                            {{ $student->branch ? $student->branch->name : '' }}</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Invoice</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example5" class="display">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Code</th>
                                                <th>Invoice Date</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Vat%</th>
                                                {{-- <th>Discount</th>
                                                <th>Late Fee</th> --}}
                                                <th>Paid Amount</th>
                                                <th>Payable</th>
                                                <th>Status</th>
                                                <th>Period</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $total = 0;
                                            $total_paid = 0;
                                            $total_remaining = 0;
                                        @endphp
                                        <tbody>
                                            @foreach ($invoice as $key => $value)
                                                @php
                                                    $total += $value->amount;
                                                    $total_paid += $value->receipt->sum('amount');
                                                    $total_remaining += $value->remainigAmount();
                                                @endphp
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->code }}</td>
                                                    <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                                    <td>{{ $value->type == 'Refundable' ? 'Deposit' : ($value->type == 'Resource Fee' ? 'Resources' : $value->type) }}
                                                    </td>
                                                    <td>£{{ $value->amount }}</td>
                                                    <td>{{ auth()->user()->priceFormat($value->tax) }}%</td>
                                                    {{-- <td>£{{ $value->receipt->sum('discount') + $value->receipt->sum('credit_discount') }}
                                                    </td> --}}
                                                    {{-- <td>£{{ $value->receipt->sum('late_fee') }}</td> --}}
                                                    <td>£{{ $value->receipt->sum('amount') }}
                                                    </td>
                                                    <td>£{{ $value->remainingAmount() }}
                                                    </td>
                                                    <td>{{ $value->status() }}</td>
                                                    <td>{{ $value->period() }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="true">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start"
                                                            style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                                                            @if (auth()->user()->role->name == 'parent')
                                                                <a class="dropdown-item btn-event"
                                                                    href="{{ route('invoice.print', $value->id) }}"
                                                                    data-toggle="modal"
                                                                    data-target="#print-{{ $value->id }}">Print</a>
                                                            @else
                                                                @if (!$value->is_paid)
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('receipt.show', $value->id) }}">Recieve</a>
                                                                    @if ($value->receipt->count() > 0)
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('invoice.refund.index', $value->id) }}">Refund</a>
                                                                    @endif
                                                                @elseif ($value->receipt->count() > 0)
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('invoice.refund.index', $value->id) }}">Refund</a>
                                                                @endif
                                                                <a class="dropdown-item btn-event"
                                                                    href="{{ route('invoice.print', $value->id) }}"
                                                                    data-toggle="modal"
                                                                    data-target="#print-{{ $value->id }}">Print</a>

                                                                <!-- Trigger the modal with a button -->
                                                                @if (!$value->is_paid && count($value->receipt) == 0)
                                                                    <form
                                                                        action="{{ route('invoice.destroy', $value->id) }}"
                                                                        id="myForm{{ $value->id }}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <span
                                                                            onclick="document.getElementById('myForm{{ $value->id }}').submit();"
                                                                            class="dropdown-item">Delete</span>
                                                                    </form>
                                                                @endif
                                                            @endif


                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>£{{ $total }}</th>
                                                <th></th>
                                                {{-- <th></th>
                                                <th></th> --}}
                                                <th>£{{ $total_paid }}</th>
                                                <th>£{{ $total_remaining }}</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    @foreach ($invoice as $key => $value)
        @include('invoice.modal.print')
    @endforeach

    </div>
@endsection
