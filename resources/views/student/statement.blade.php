<style>
    @media print {
        .modal tr {
            border: 1px solid;
        }

        .modal td,
        .modal th {
            border: 1px solid;
        }

        .modal table {
            width: 100%;
        }

        .modal .text-align-end {
            text-align: end;
        }

        .modal .bg-dark-grey {
            background-color: #A5A5A5 !important;
        }

        .modal .bg-grey {
            background-color: #d1cfcf !important;
        }

        .modal .border-grey {
            border: 3px solid #A5A5A5 !important;
        }

        .modal h3 {
            color: black;
        }

        .modal .border-black {
            border: 3px solid black !important;
        }

        .modal .text-white {
            color: rgb(255, 255, 255);
        }

        .modal .text-grey {
            color: #d1cfcf;
        }
    }

    .modal tr {
        border: 1px solid;
    }

    .modal td,
    .modal th {
        border: 1px solid;
    }

    .modal table {
        width: 100%;
    }

    .modal .text-align-end {
        text-align: end;
    }

    .modal .bg-dark-grey {
        background-color: #A5A5A5 !important;
    }

    .modal .bg-grey {
        background-color: #d1cfcf !important;
    }

    .border-grey {
        border: 3px solid #A5A5A5 !important;
    }

    .modal h3 {
        color: black;
    }

    .border-black {
        border: 3px solid black !important;
    }

    .text-white {
        color: rgb(255, 255, 255);
    }

    .text-grey {
        color: #d1cfcf;
    }
</style>
<div class="modal fade print printme" id="statement-{{ $value->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Statement</h5>
                <a class="btn btn-primary" target="_blank" href="{{ route('student.statement', $value->id) }}">Print</a>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">



                        <img src="{{ asset('images/logo.png') }}" width="300" alt="">

                    </div>

                </div>
                <div class="row pt-4">

                    <div class="col-12 text-center">


                        <h3 class="">
                            {{ $value->branch->res_address }},{{ $value->branch->res_second_address }}
                            ,{{ $value->branch->res_postal_code }}, {{ $value->branch->res_town }}, United Kingdom
                        </h3>

                    </div>

                </div>
                <div class="border-black bg-grey">
                    <div class="">
                        <h3 class="text-center mb-0 font-weight-bolder">Account Statement</h3>
                    </div>
                </div>
                <div class="row pt-3">

                    <div class="col-6 pl-2 p-0">

                        <table>
                            <tbody>
                                <tr>
                                    <td style="width: 40%">
                                        <h4 class="font-weight-bolder">Roll No</h4>
                                    </td>
                                    <td class="">
                                        <h4 class="font-weight-bolder">{{ $value->roll_no }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">
                                        <h4 class="font-weight-bolder">Name</h4>
                                    </td>
                                    <td class="">
                                        <h4 class="font-weight-bolder">
                                            {{ $value->first_name }} {{ $value->last_name }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">
                                        <h4 class="font-weight-bolder">Parent</h4>
                                    </td>
                                    <td class="">
                                        <h4 class="font-weight-bolder">
                                            {{ $value->parents[0]->first_name }} {{ $value->parents[0]->last_name }}
                                        </h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">
                                        <h4 class="font-weight-bolder">Year </h4>
                                    </td>
                                    <td class="">
                                        <h4 class="font-weight-bolder">
                                            {{ $value->currentYear()->name }}
                                        </h4>
                                    </td>
                                </tr>


                            </tbody>
                        </table>

                    </div>
                    <div class="col-3"></div>
                    <div class="col-3 text-align-end border-black">
                        <h4> {{ $value->parents[0]->res_address }}</h4>
                        <h4 class="">{{ $value->parents[0]->res_second_address }}</h4>
                        <h4 class="">{{ $value->parents[0]->res_town }}</h4>
                        <h4 class="">{{ $value->parents[0]->res_postal_code }}</h4>
                    </div>




                </div>


                <div class="row pt-5">
                    <table>
                        <thead>
                            <tr class="bg-grey">
                                <th style="width: 15%;" class="text-center">
                                    Invoice
                                </th>
                                <th style="width: 15%;" class="text-center">
                                    Date
                                </th>
                                <th style="width: 25%;" class="text-center">
                                    Detail
                                </th>
                                <th style="width: 15%;" class="text-center">Debit</th>
                                <th style="width: 15%;" class="text-center">Credit</th>
                                <th style="width: 15%;" class="text-center"> Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $grandTotal = 0;
                                $debit = 0;
                                $credit = 0;
                                $total = 0;
                            @endphp
                            @foreach ($value->invoice as $value1)
                                @php
                                    $total += $value1->amount;
                                    $debit += $value1->amount;
                                @endphp
                                <tr>
                                    @php
                                        $row = 1;

                                        if ($value1->receipt) {
                                            foreach ($value1->receipt as $key => $value1Recipt) {
                                                if ($value1Recipt->amount > 0) {
                                                    $row++;
                                                }
                                                if ($value1Recipt->discount > 0) {
                                                    $row++;
                                                    // dd($row);
                                                }
                                                if ($value1Recipt->late_fee > 0) {
                                                    $row++;
                                                }
                                            }
                                        }

                                    @endphp
                                    <td rowspan="{{ $row }}" class="text-center">{{ $value1->code }}</td>
                                    <td>{{ auth()->user()->ukFormat($value1->created_at->toDateString()) }}</td>
                                    <td>{{ $value1->type == 'Refundable' ? 'Deposit' : $value1->type }}</td>
                                    <td class="text-align-end"> £{{ auth()->user()->priceFormat($value1->amount) }}
                                    </td>
                                    <td class="text-align-end"> £0</td>
                                    <td class="text-align-end"> £{{ auth()->user()->priceFormat($total) }}</td>
                                </tr>
                                @foreach ($value1->receipt as $value11)
                                    @php
                                        $total = $total - $value11->discount;
                                        $credit += $value11->discount;
                                    @endphp
                                    @if ($value11->discount > 0)
                                        <tr>

                                            <td>{{ $value11->date }}</td>
                                            <td>Discount</td>
                                            <td class="text-align-end">£0</td>
                                            <td class="text-align-end">
                                                £{{ auth()->user()->priceFormat($value11->discount) }}</td>
                                            <td class="text-align-end">£{{ auth()->user()->priceFormat($total) }}</td>
                                        </tr>
                                    @endif
                                    @php
                                        $total = $total + $value11->late_fee;
                                        $debit += $value11->late_fee;

                                    @endphp
                                    @if ($value11->late_fee > 0)
                                        <tr>

                                            <td>{{ auth()->user()->ukFormat($value11->date) }}</td>
                                            <td>Late Fee</td>
                                            <td class="text-align-end">
                                                £{{ auth()->user()->priceFormat($value11->late_fee) }}</td>
                                            <td class="text-align-end">£0</td>
                                            <td class="text-align-end">£{{ auth()->user()->priceFormat($total) }}</td>
                                        </tr>
                                    @endif
                                    @php
                                        $total = $total - $value11->amount;

                                    @endphp
                                    <tr>

                                        <td>{{ auth()->user()->ukFormat($value11->date) }}</td>
                                        <td>{{ $value11->description }} {{ $value11->mode }} {{ $value11 }}</td>
                                        <td class="text-align-end">£0</td>
                                        <td class="text-align-end">£{{ auth()->user()->priceFormat($value11->amount) }}
                                        </td>
                                        <td class="text-align-end">£{{ auth()->user()->priceFormat($total) }}</td>


                                    </tr>

                                    @php
                                        $grandTotal += $total;
                                        $credit += $value11->amount;

                                    @endphp
                                @endforeach
                            @endforeach
                            @foreach ($value->wallet as $value1)
                                <td rowspan="" class="text-center"></td>
                                <td>{{ auth()->user()->ukFormat($value1->date) }}</td>
                                <td>{{ $value1->description }} {{ $value1->mode }} Credit</td>
                                <td class="text-align-end"> £0</td>
                                <td class="text-align-end"> £{{ auth()->user()->priceFormat($value1->amount) }}
                                </td>
                                <td class="text-align-end"> £{{ auth()->user()->priceFormat($total) }}</td>
                                @php
                                    $grandTotal += $total;
                                    $credit += $value11->amount;
                                @endphp
                            @endforeach
                            <tr class="bg-grey">
                                <th style="width: 15%;" class="text-center">

                                </th>
                                <th style="width: 15%;" class="text-center">

                                </th>
                                <th style="width: 25%;" class="text-center">

                                </th>
                                <th style="width: 15%;" class="text-align-end">
                                    £{{ auth()->user()->priceFormat($debit) }}</th>
                                <th style="width: 15%;" class="text-align-end">
                                    £{{ auth()->user()->priceFormat($credit) }}</th>
                                <th style="width: 15%;" class="text-align-end">
                                    £{{ auth()->user()->priceFormat($debit - $credit) }}</th>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
