<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statement print</title>
    <link rel="stylesheet" href="{{ asset('vendor/jqvmap/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <!-- Summernote -->
    <link href="{{ asset('vendor/summernote/summernote.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin-3.css') }}">


    <style>
        @media print {
            tr {
                border: 1px solid;
            }

            td,
            th {
                border: 1px solid;
            }

            table {
                width: 100%;
            }

            .text-align-end {
                text-align: end;
            }

            .bg-dark-grey {
                background-color: #A5A5A5 !important;
            }

            .bg-grey {
                background-color: #d1cfcf !important;
            }

            .border-grey {
                border: 3px solid #A5A5A5 !important;
            }

            h3 {
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
        }

        tr {
            border: 1px solid;
        }

        td,
        th {
            border: 1px solid;
        }

        table {
            width: 100%;
        }

        .text-align-end {
            text-align: end;
        }

        .bg-dark-grey {
            background-color: #A5A5A5 !important;
        }

        .bg-grey {
            background-color: #d1cfcf !important;
        }

        .border-grey {
            border: 3px solid #A5A5A5 !important;
        }

        h3 {
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
</head>



<body class="pt-5" style="padding-left: 6rem!important; width:70%; background-color:white;">
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
                            <h4 class="font-weight-bolder">{{ $value->currentRollNo() }}</h4>
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
                    <th style="width: 10%;" class="text-center">
                        Date
                    </th>
                    <th style="width: 30%;" class="text-center">
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
                    <tr style="color: rgb(146, 10, 10);">
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
                                    if ($value1Recipt->credit_discount > 0) {
                                        $row++;
                                        // dd($row);
                                    }
                                    if ($value1Recipt->late_fee > 0) {
                                        $row++;
                                    }
                                    if ($value1Recipt->mode == 'Bank_Wallet') {
                                        $row++;
                                    }
                                    if ($value1Recipt->mode == 'Cash_Wallet') {
                                        $row++;
                                    }
                                }
                            }
                        @endphp
                        <td rowspan="{{ $row }}" class="text-center" style="color: black;">
                            {{ $value1->code }}</td>
                        <td>{{ auth()->user()->ukFormat($value1->date) }}</td>
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
                            <tr style="color: rgb(7, 116, 7);">

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
                        {{-- @endphp --}}
                        @if ($value11->credit_discount > 0)
                            <tr style="color:rgb(146, 10, 10);">

                                <td>{{ $value11->date }}</td>
                                <td>Credit Discount Debit</td>
                                <td class="text-align-end">
                                    £{{ auth()->user()->priceFormat($value11->credit_discount) }}</td>
                                <td class="text-align-end">£0</td>
                                <td class="text-align-end">£{{ auth()->user()->priceFormat($total) }}</td>
                            </tr>
                            @php
                                $total = $total + $value11->credit_discount;
                                $debit += $value11->credit_discount;
                            @endphp
                            <tr style="color: rgb(7, 116, 7);">
                                <td>{{ $value11->date }}</td>
                                <td>Credit Discount Credit</td>
                                <td class="text-align-end">£0</td>
                                <td class="text-align-end">
                                    £{{ auth()->user()->priceFormat($value11->credit_discount) }}</td>
                                <td class="text-align-end">£{{ auth()->user()->priceFormat($total) }}</td>
                                @php
                                    $total = $total - $value11->credit_discount;
                                    $credit += $value11->credit_discount;
                                @endphp
                            </tr>
                        @endif
                        @if ($value11->late_fee > 0)
                            <tr style="color:rgb(146, 10, 10);">
                                <td>{{ auth()->user()->ukFormat($value11->date) }}</td>
                                <td>Late Fee</td>
                                <td class="text-align-end">
                                    £{{ auth()->user()->priceFormat($value11->late_fee) }}</td>
                                <td class="text-align-end">£0</td>
                                <td class="text-align-end">£{{ auth()->user()->priceFormat($total) }}</td>
                            </tr>
                        @endif
                        @if (str_contains($value11, 'Wallet'))
                            @php
                                $total = $total + $value11->amount;
                                $debit += $value11->amount;
                            @endphp
                            <tr style="color: rgb(146, 10, 10);">
                                <td>{{ auth()->user()->ukFormat($value11->date) }}</td>
                                <td>{{ $value11->description }} {{ $value11->mode }}
                                    Debit </td>
                                <td class="text-align-end">
                                    £{{ auth()->user()->priceFormat($value11->amount) }}
                                </td>
                                <td class="text-align-end">£0</td>
                                <td class="text-align-end">£{{ auth()->user()->priceFormat($total) }}</td>
                            </tr>
                        @endif
                        @php
                            $total = $total - $value11->amount;
                        @endphp
                        <tr style="color: rgb(7, 116, 7);">
                            <td>{{ auth()->user()->ukFormat($value11->date) }}</td>
                            <td>{{ $value11->description }} @if ($value11->mode != 'transfer')
                                    {{ $value11->mode }}
                                @endif
                                {{ str_contains($value11, 'Wallet') ? 'Credit' : '' }} </td>
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

                {{-- @foreach ($value->invoice as $value2)
                    @foreach ($value2->receipt as $value3)
                        @if (str_contains($value3->mode, 'Wallet'))
                            <tr>
                                <td></td>
                                <td>{{ $value3->date }}</td>
                                <td></td>
                                <td class="text-align-end">
                                    £{{ auth()->user()->priceFormat($value3->amount) }}</td>
                                <td class="text-align-end">£0</td>
                                <td class="text-align-end">£{{ auth()->user()->priceFormat($total) }}</td>
                            </tr>

                            @php
                                $total = $total + $value3->late_fee;
                                $debit += $value3->late_fee;

                            @endphp
                        @endif
                    @endforeach
                @endforeach --}}
                @foreach ($value->wallet as $value1)
                    @php
                        $total = $total - $value1->amount;
                        $grandTotal += $total;
                        $credit += $value1->amount;
                    @endphp
                    <tr style="background-color: skyblue;">

                        <td rowspan="" class="text-center"></td>
                        <td>{{ auth()->user()->ukFormat($value1->date) }}</td>
                        <td>{{ $value1->description }} {{ $value1->mode }} Credit</td>
                        <td class="text-align-end"> £0</td>
                        <td class="text-align-end"> £{{ auth()->user()->priceFormat($value1->amount) }}
                        </td>
                        <td class="text-align-end"> £{{ auth()->user()->priceFormat($total) }}</td>
                    </tr>
                @endforeach
                @if (count($value->invoice) && $value->invoice[0]->refund)
                    @if ($value->invoice[0]->refund->paid_by_bank || $value->invoice[0]->refund->paid_by_cash)
                        @php
                            $total -= $value->invoice[0]->amount;
                            $credit += $credit;
                        @endphp
                        <tr style="background-color: rgb(255, 148, 148);">
                            <td></td>
                            <td>{{ auth()->user()->ukFormat($value->invoice[0]->refund->updated_at) }}</td>
                            <td>Deposit Credited from Deposit Account
                            </td>
                            <td class="text-align-end">£0</td>
                            <td class="text-align-end">
                                £{{ auth()->user()->priceFormat($value->invoice[0]->amount) }}
                            </td>
                            <td class="text-align-end">£{{ auth()->user()->priceFormat($total) }}</td>
                        </tr>
                        @php
                            $total += $value->invoice[0]->amount;
                            $debit += $debit;
                        @endphp

                        <tr style="background-color: rgb(247, 150, 150);">
                            <td></td>
                            <td>{{ auth()->user()->ukFormat($value->invoice[0]->refund->updated_at) }}</td>
                            <td>Refund to Student by
                                {{ $value->invoice[0]->refund->pay_by_bank ? 'Bank' : 'Cash' }} </td>
                            <td class="text-align-end">
                                £{{ auth()->user()->priceFormat($value->invoice[0]->amount) }}
                            </td>
                            <td class="text-align-end">£0</td>
                            <td class="text-align-end">£{{ auth()->user()->priceFormat($total) }}</td>
                        </tr>
                    @endif
                @endif
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
    {{-- <script type="text/javascript">
        window.print();
        window.onfocus = function() {
            window.close();
        }
    </script> --}}
</body>
<script>
    window.print();
    window.onafterprint = back;

    function back() {
        window.close();
    }
</script>

</html>
