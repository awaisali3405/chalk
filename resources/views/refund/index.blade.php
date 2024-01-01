@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Student Deposit</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Student</th>
                                                    <th>Received By Cash</th>
                                                    <th>Received By Bank</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($refund as $key => $value)
                                                    @if ($value->remainingDeposit() > 0)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $value->invoice->student->name() }}

                                                            </td>
                                                            <td>
                                                                £{{ auth()->user()->priceFormat($value->invoice->receipt()->where('mode', 'Cash')->sum('amount')) }}
                                                            </td>
                                                            <td>
                                                                £{{ auth()->user()->priceFormat($value->invoice->receipt()->where('mode', 'Bank')->sum('amount')) }}
                                                            </td>
                                                            <td>
                                                                £{{ auth()->user()->priceFormat($value->remainingDeposit()) }}
                                                            </td>
                                                            <td>
                                                                {{ auth()->user()->ukFormat($value->invoice->receipt()->latest()->first()->date) }}
                                                            </td>
                                                            <td>
                                                                @if ($value->remainingDeposit() > 0)
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="true">
                                                                        Action
                                                                    </button>
                                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                                        style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                                                                        @if ($value->lock)
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('refund.unlock', $value->id) }}">Unlock</a>
                                                                        @endif
                                                                        @if ($value->invoice->student->isFullyPaid())
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('refund.pay', $value->id) }}">Pay</a>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
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
