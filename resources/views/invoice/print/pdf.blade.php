<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice print</title>
    <link rel="stylesheet" href="{{ asset('vendor/jqvmap/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <!-- Summernote -->
    <link href="{{ asset('vendor/summernote/summernote.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin-3.css') }}">
    <!-- Datatable -->
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<style>
    /* Print Invoice */
    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
        background-color: white; // Choose your own color here
    }

    .table-striped>tbody>tr:nth-child(even)>td,
    .table-striped>tbody>tr:nth-child(even)>th {
        background-color: #EEEEEE; // Choose your own color here
    }

    .text-blue {
        color: #5d9cec;
    }

    .text-align-end {
        text-align: end !important;
    }

    .border-black {
        border: 2px solid black !important;
    }

    .border-black-top-none {
        border-top-style: none !important;
    }

    .border-grey {
        border: 3px solid #EEEEEE;
    }

    .table-print {
        width: 100%;
    }

    b {
        padding-left: 2px;
    }

    .table-2 {
        width: 100%;

        border-collapse: collapse;
    }


    .table-2 thead tr {
        background-color: rgb(127, 127, 127);
        color: white;
        text-align: center;

    }

    .bg-grey {
        background-color: #EEEEEE !important;
    }

    .text-grey {
        color: #EEEEEE !important;
    }

    tr.border-x-black td {
        border: 1px solid black;
    }

    * {
        font-size: x-large;
    }

    /* Print End */
</style>

<body>

    <div class="" style="background-color: white;">
        <div class="row">
            <div class="col-6 ">


                <img src="{{ asset('images/logo.png') }}" width="400" alt="">

            </div>
            <div class="col-6  text-center">
                <h5 class="font-weight-bolder p-0 text-blue " style="font-size: 4rem;">
                    {{ count($invoice->receipt) > 0 ? 'Receipt' : 'Invoice' }}</h4>
            </div>

        </div>
        <div class="row pt-4 pl-3">
            <div class="col-6 pr-4">
                <div class="row  border-black pl-3">
                    <div class="col-1 p-0">

                        <h6>To:</h6>
                    </div>
                    <div class="pr-4 col-11">

                        <h6>{{ $invoice->student->first_name }}
                            {{ $invoice->student->last_name }}</h6>
                        <h6>{{ $invoice->student->branch->res_third_address }},{{ $invoice->student->parents[0]->res_second_address }},
                            {{ $invoice->student->parents[0]->res_address }}</h6>
                        <h6>{{ $invoice->student->parents[0]->res_town }}</h6>
                        <h6>
                            {{ $invoice->student->parents[0]->res_postal_code }}</h6>

                        <h6>
                            Email:
                        </h6>
                        <h6 class="pb-3">
                            Phone:
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-6 pr-4">
                <div class="border-black row pl-3">
                    <div class="col-1 p-0">

                        <h6>From:</h6>
                    </div>
                    <div class="pr-4 col-11">



                        <h6>
                            {{ $invoice->student->branch->res_address }}</h6>
                        <h6>{{ $invoice->student->branch->res_second_address }}
                            ,{{ $invoice->student->branch->res_third_address }}
                        </h6>
                        <h6>{{ $invoice->student->branch->res_postal_code }},
                            {{ $invoice->student->branch->res_town }}
                        </h6>
                        <h6>
                            email:
                        </h6>
                        <h6>
                            Phone:
                        </h6>
                        <h6>
                            Company No:
                        </h6>
                        <h6>
                            VAT reg No:
                        </h6>

                    </div>

                </div>
            </div>

        </div>
        <div class="row pt-3">
            <div class="col-6">

                <div class="row pl-3">

                    <div class="col-12 p-0 table-responsive">
                        <table class="table-bordered table-print border-grey" style="">
                            <tbody>
                                <tr>
                                    <td>
                                        <b>Student Name</b>
                                    </td>
                                    <td>
                                        <b>{{ $invoice->student->name() }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Student ID</b>
                                    </td>
                                    <td>
                                        <b>{{ $invoice->student->id }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Student Year</b>
                                    </td>
                                    <td>
                                        <b>{{ $invoice->student->year->name }}
                                        </b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 pl-2 pt-4 table-responsive">
                <table class="table-bordered table-print border-grey ">
                    <tbody>
                        <tr>
                            <td style="width: 40%">
                                <b>Invoice Date</b>
                            </td>
                            <td class="text-center">
                                <b>
                                    {{ \Carbon\Carbon::parse($invoice->created_at)->format('j-F-Y') }}</b>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%">
                                <b>Invoice No</b>
                            </td>
                            <td class="text-center">
                                <b>{{ $invoice->id }}</b>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>




        </div>
        <div class="row pt-3 text-center">
            <div class="col-6">

            </div>
            <div class="col-6">

                <table class="table-striped table-bordered table-2">
                    <thead>
                        <tr>
                            <th>Payment Due by</th>
                            <th>Final Payment Due</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                23-Sep-24
                            </td>
                            <td>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="">
            <div class="row  ">
                <div class="col-12 table-responsive ">

                    <table class="table-2 table-striped  table-bordered border-black">
                        <thead>
                            <tr>
                                <th>

                                </th>
                                <th class="">
                                    <b> Description</b>
                                </th>
                                <th class="">
                                    <b>Rate</b>
                                </th>
                                <th>
                                    <b> Tax</b>
                                </th>
                                <th class="">
                                    <b>Amount</b>
                                </th>
                            </tr>
                        </thead>
                        {{-- @php
                            $description = '';
                            if ($invoice->type == 'Refundable') {
                                $description = '';
                            }else if(str_contains($invoice->type,'Fee')){
                                $description = 'Deposit (Refundable)';

                            }
                        @endphp --}}
                        @php
                            $to = \Carbon\Carbon::parse($invoice->from_date);
                            $from = \Carbon\Carbon::parse($invoice->to_date);

                            $weeks = $to->diffInWeeks($from->addDay(1));
                            $months = $to->diffInMonths($from->addDay(1));
                        @endphp
                        <tbody>
                            {{-- @dd($invoice->subject) --}}
                            @if (str_contains($invoice->type, 'Resource Fee'))
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <b>Resource Invoice - Academaic year
                                            {{ date('Y', strtotime($invoice->from_date)) }}/{{ date('Y', strtotime($invoice->to_date)) }}
                                        </b>
                                    </td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                            @elseif (str_contains($invoice->type, 'Sale Invoice'))
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <b>Sale Invoice
                                            {{ date('Y', strtotime($invoice->from_date)) }}/{{ date('Y', strtotime($invoice->to_date)) }}
                                        </b>
                                    </td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                            @elseif(str_contains($invoice->type, 'Week'))
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <b>{{ $weeks }} Week</b>
                                    </td>

                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                            @elseif (str_contains($invoice->type, 'Addition Invoice'))
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <b>Additional Invoice
                                            ({{ $invoice->from_date }} -
                                            {{ $invoice->to_date }})
                                        </b>
                                    </td>

                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                            @else
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <b>{{ $months }}
                                            Month{{ $months > 1 ? 's' : '' }}</b>
                                    </td>

                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                            @endif
                            @if ($invoice->type == 'Refundable')

                                <tr>
                                    <td class="text-center">
                                        <b>1</b>
                                    </td>
                                    <td class="pl-2 ">
                                        <b> Deposit (Refundable)</b>
                                    </td>
                                    <td class="text-center bg-grey">
                                        <b>£{{ $invoice->amount }}</b>
                                    </td>
                                    <td class="text-center bg-grey">
                                        <b>{{ $invoice->tax }}%</b>
                                    </td>
                                    <td class="text-center bg-grey">
                                        <b>£{{ $invoice->amount }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="pl-2">
                                        <h6>Until {{ $invoice->to_date }} </h6>
                                    </td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                                @php
                                    $sr = 2;
                                @endphp
                            @elseif (str_contains($invoice->type, 'Sale Invoice'))
                                @foreach ($invoice->saleProduct as $key => $value)
                                    <tr>
                                        <td class="text-center">
                                            <b>{{ $key + 1 }}</b>
                                        </td>
                                        <td class="pl-2 ">
                                            <b> {{ $value->product->name }}</b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>£{{ $value->rate }}</b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>{{ $invoice->tax }}%</b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>£{{ $value->amount }}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                        </td>
                                        <td class="bg-grey text-centertext-center">
                                            <h6>{{ $value->quantity }} Qty </h6>

                                        </td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                    </tr>
                                @endforeach
                                @php
                                    $sr = $key + 2;
                                @endphp
                            @elseif (str_contains($invoice->type, 'Addition Invoice'))
                                @foreach ($invoice->subject as $key => $value)
                                    <tr>
                                        <td class="text-center">
                                            <b>{{ $key + 1 }}</b>
                                        </td>
                                        <td class="pl-2 ">
                                            <b> {{ $value->subject_name }}</b>
                                        </td>
                                        <td class="text-center text-center">
                                            <b>£{{ $value->subject_rate }}</b>
                                        </td>
                                        <td class="text-center text-center">
                                            <b>{{ $invoice->tax }}%</b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>£{{ $value->subject_amount }}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                            {{-- <h6>Until {{ $invoice->to_date }} </h6> --}}
                                        </td>
                                        <td class="bg-grey">
                                            <h5 class=" text-center"> {{ $value->subject_hr }} hr</b>

                                        </td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                    </tr>
                                    @php
                                        $sr = $key + 1;
                                    @endphp
                                @endforeach
                            @elseif(str_contains($invoice->type, 'Registration'))
                                <tr>
                                    <td class="text-center">
                                        <b>1</b>
                                    </td>
                                    <td class="pl-2 ">
                                        <b> Registration (Non-Refundable)</b>
                                    </td>
                                    <td class="text-center bg-grey">
                                        <b>£{{ $invoice->amount }}</b>
                                    </td>
                                    <td class="text-center bg-grey">
                                        <b>{{ $invoice->tax }}%</b>
                                    </td>
                                    <td class="text-center bg-grey">
                                        <b>£{{ $invoice->amount }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="pl-2">
                                        <h6>Until {{ $invoice->to_date }} </h6>
                                    </td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                                @php
                                    $sr = 2;
                                @endphp
                            @elseif (str_contains($invoice->type, 'Resource Fee'))
                                @foreach ($invoice->subject as $key => $value)
                                    <tr class="">
                                        <td class="text-center">
                                            <b>{{ $key + 1 }}</b>
                                        </td>
                                        <td class="pl-2 ">
                                            <b>{{ $value->subject_name }} Resources
                                            </b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>£{{ $value->subject_rate }}</b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>{{ $invoice->tax }}%</b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>£{{ $value->subject_rate }}</b>
                                        </td>
                                    </tr>

                                    @php
                                        $sr = $key + 1;
                                    @endphp
                                @endforeach
                                <tr class="">
                                    <td class="text-center">
                                        <b>{{ $sr + 1 }}</b>
                                    </td>
                                    <td class="pl-2 ">
                                        <b>Exercise Book (Quantity x
                                            {{ count($invoice->subject) }} )
                                        </b>
                                    </td>
                                    <td class="text-center bg-grey">
                                        <b></b>
                                    </td>
                                    <td class="text-center bg-grey">
                                        <b></b>
                                    </td>
                                    <td class="text-center bg-grey">
                                        <b>
                                            £{{ $invoice->subject->sum('subject_book_fee') }}</b>
                                    </td>
                                </tr>

                                @php
                                    $sr = 2;
                                @endphp
                            @elseif (str_contains($invoice->type, 'Fee'))
                                {{-- @dd($invoice->student->enquirySubject) --}}
                                @if (count($invoice->student->oneOnOneSubject()) < 1)

                                    <tr>
                                        <td class="text-center">
                                            <b>1</b>
                                        </td>
                                        <td class="pl-2 ">
                                            <b> Lesson ( @foreach ($invoice->student->normalSubject() as $key => $value)
                                                    {{ $value->subject->name }}@if ($key + 1 != count($invoice->student->normalSubject()))
                                                        ,
                                                    @endif
                                                @endforeach ) -
                                                {{ $invoice->student->normalSubject()->sum('no_hr_weekly') }}
                                                hours/week </b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <h6>
                                                £{{ $invoice->student->normalSubject()[0]->rate_per_hr }}</h6>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <h6>
                                                {{ $invoice->tax }}%</h6>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>

                                                £{{ str_contains($invoice->type, 'Month') ? (str_contains($invoice->student->year->name, '11') ? number_format((($invoice->student->normalSubject()->sum('amount') * 40) / 9) * $months, 2) : number_format((($invoice->student->normalSubject()->sum('amount') * 52) / 12) * $months, 2)) : $invoice->student->normalSubject()->sum('amount') * $weeks }}
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                            <h6>Period {{ $invoice->from_date }} -
                                                {{ $invoice->to_date }} </h6>
                                        </td>
                                        <td class="bg-grey text-centertext-center">
                                            <h6>
                                                £{{ $invoice->student->normalSubject()->sum('amount') }}
                                                Weekly</h6>
                                        </td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-center">
                                            <b>1</b>
                                        </td>
                                        <td class="pl-2 ">
                                            <b> 1 - 1( @foreach ($invoice->student->oneOnOneSubject() as $value)
                                                    {{ $value->subject->name }},
                                                @endforeach ) </b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>£{{ $invoice->amount }}</b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>{{ $invoice->tax }}%</b>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <b>£{{ $invoice->amount }}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                            <h6>Until {{ $invoice->to_date }} </h6>
                                        </td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                    </tr>
                                @endif
                                @php
                                    $sr = 3;
                                @endphp

                            @endif


                            @if (count($invoice->receipt) > 0)
                                @if ($invoice->receipt->sum('late_fee') > 0)
                                    <tr class="">
                                        <td class=" text-center">
                                            <b>
                                                {{ $sr++ }}

                                            </b>
                                        </td>
                                        <td class="pl-2">
                                            <b>Late Payment Charges</b>
                                        </td>
                                        <td class="bg-grey">
                                            <b></b>
                                        </td>
                                        <td class="bg-grey text-center">
                                            <b>0%</b>
                                        </td>
                                        <td class="bg-grey text-center">
                                            <b>

                                                £{{ $invoice->receipt->sum('late_fee') }}
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" text-center">

                                        </td>
                                        <td class="pl-2">
                                            (will be applied after 7 days of this receipt)
                                        </td>
                                        <td class="bg-grey">

                                        </td>
                                        <td class="bg-grey">

                                        </td>
                                        <td class="bg-grey text-center">

                                        </td>
                                    </tr>
                                @endif
                                @if ($invoice->receipt->sum('discount') > 0)
                                    <tr>
                                        <td class=" text-center">
                                            <b>
                                                {{ $sr++ }}

                                            </b>
                                        </td>
                                        <td class="pl-2">
                                            <b>Discount</b>
                                        </td>
                                        <td class="bg-grey">
                                            <b></b>
                                        </td>
                                        <td class="bg-grey text-center">
                                            <b>{{ $invoice->tax }}%</b>
                                        </td>
                                        <td class="bg-grey text-center">
                                            <b>

                                                -£{{ $invoice->receipt->sum('discount') }}
                                            </b>
                                        </td>
                                    </tr>
                                    <tr class="border-x-black">
                                        <td class=" text-center">

                                        </td>
                                        <td class="pl-2">

                                        </td>
                                        <td class="bg-grey text-grey">
                                            blanck
                                        </td>
                                        <td class="bg-grey text-center">
                                        </td>
                                        <td class="bg-grey text-center">

                                        </td>
                                    </tr>
                                @endif
                                @if ($invoice->receipt->sum('discount') > 0 || $invoice->receipt->sum('late_fee') > 0)
                                    <tr class="border-x-black">
                                        <td class=" text-center">

                                        </td>
                                        <td class="pl-2">
                                            <b>Total</b>
                                        </td>
                                        <td class="bg-grey">
                                            <b></b>
                                        </td>
                                        <td class="bg-grey text-center">
                                        </td>
                                        <td class="bg-grey text-center">
                                            <b>

                                                £{{ $invoice->amount - $invoice->receipt->sum('discount') + $invoice->receipt->sum('late_fee') }}
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" text-center">

                                        </td>
                                        <td class="pl-2">

                                        </td>
                                        <td class="bg-grey text-grey">
                                            blanck
                                        </td>
                                        <td class="bg-grey text-center">
                                        </td>
                                        <td class="bg-grey text-center">

                                        </td>
                                    </tr>
                                @endif

                                @foreach ($invoice->receipt as $key => $value)
                                    <tr>
                                        <td class=" text-center">

                                        </td>
                                        <td class="pl-2">
                                            <b>{{ $value->description }}
                                                {{ $value->mode }}</b>
                                        </td>
                                        <td class="bg-grey">
                                            <b></b>
                                        </td>
                                        <td class="bg-grey">
                                            <b></b>
                                        </td>
                                        <td class="bg-grey text-center">
                                            <b>

                                                -£{{ $value->amount }}
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                            <h6>{{ $value->date }}</h6>
                                        </td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row pl-2">
                <div class="col-6">

                </div>
                <div class="col-6">
                    <table class="table-2  border-black border-black-top-none">
                        <tbody>
                            <tr>
                                <td colspan="2" class="text-center">
                                    Invoice Summary
                                </td>
                            </tr>
                            <tr>


                                <td class="">
                                    Sub Total INCLUSIVE VAT
                                </td>
                                <th class="text-center">

                                    £{{ $invoice->totalAmount() }}

                                </th>
                            </tr>
                            <tr>


                                <td class="">
                                    Balance
                                </td>
                                <th class="text-center">

                                    £{{ $invoice->remainingAmount() }}

                                </th>
                            </tr>
                            <tr>


                                <th class="" colspan="">
                                    Vat Inclusive
                                </th>
                                <th class="text-center">

                                    £{{ number_format($invoice->taxAmount(), 2) }}

                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12">
                <b>Term & Condition</b>
                <p class="justify-end " style="font-size: small;">Once you pay your deposit, you have agreed
                    to start your course with
                    Chalk n Duster. If under any circumstances you change your mind or you're not able to
                    continue without following 4-weeks of leaving procedure (notice period), your deposit will
                    not be refunded and you'll liable to pay the fees for the next 4 weeks.Fees is always made
                    upfront & should be paid as agreed or on the date this invoice is generated (5 days grace
                    period is given for payment). Failure to comply with the company policies we may pass your
                    account to the debt collection team. For full terms & conditions of business, refer to the
                    application form.</p>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-12">
                <p class="mb-0 text-center pt-5">Should you have any query converning this invoice/receipt,
                    please contact
                    us on
                    02085777077 or 07535050502 </p>
                <p class="font-weight-bolder p-0 text-center pt-4">Thank you for your business!</p>
                <p class="text-center font-weight-bolder p-0">Company Registration Number:
                    {{ $invoice->student->branch->company_number }}</p>
            </div>
        </div> --}}
    </div>
</body>
<script>
    window.print();
    window.onafterprint = back;

    function back() {
        window.close();
    }
</script>

</html>
