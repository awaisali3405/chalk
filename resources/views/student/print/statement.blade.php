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
                {{ $student->branch->res_address }},{{ $student->branch->res_second_address }}
                ,{{ $student->branch->res_postal_code }}, {{ $student->branch->res_town }}, United Kingdom</h3>

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
                            <h4 class="font-weight-bolder">{{ $student->id }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%">
                            <h4 class="font-weight-bolder">Name</h4>
                        </td>
                        <td class="">
                            <h4 class="font-weight-bolder">{{ $student->first_name }}{{ $student->last_name }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%">
                            <h4 class="font-weight-bolder">Parent</h4>
                        </td>
                        <td class="">
                            <h4 class="font-weight-bolder">
                                {{ $student->parents[0]->first_name }}{{ $student->parents[0]->last_name }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%">
                            <h4 class="font-weight-bolder">Year </h4>
                        </td>
                        <td class="">
                            <h4 class="font-weight-bolder">
                                {{ $student->promotionDetail()->where('academic_year_id',auth()->user()->session()->id)->first()->toYear->name }}
                            </h4>
                        </td>
                    </tr>


                </tbody>
            </table>

        </div>
        <div class="col-3"></div>
        <div class="col-3 text-align-end border-black">
            <h4> {{ $student->parents[0]->res_address }}</h4>
            <h4 class="">{{ $student->parents[0]->res_second_address }}</h4>
            <h4 class="">{{ $student->parents[0]->res_town }}</h4>
            <h4 class="">{{ $student->parents[0]->res_postal_code }}</h4>
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
                @foreach ($student->invoice as $value)
                    @php
                        $total += $value->amount;
                        $debit += $value->amount;
                    @endphp
                    <tr>
                        @php
                            $row = 1;

                            if ($value->receipt) {
                                foreach ($value->receipt as $key => $valueRecipt) {
                                    if ($valueRecipt->amount > 0) {
                                        $row++;
                                    }
                                    if ($valueRecipt->discount > 0) {
                                        $row++;
                                        // dd($row);
                                    }
                                    if ($valueRecipt->late_fee > 0) {
                                        $row++;
                                    }
                                }
                            }

                        @endphp
                        <td rowspan="{{ $row }}" class="text-center">{{ $value->id }}</td>
                        <td>{{ $value->created_at->toDateString() }}</td>
                        <td>{{ $value->type }}</td>
                        <td class="text-align-end"> £{{ $value->amount }}</td>
                        <td class="text-align-end"> £0</td>
                        <td class="text-align-end"> £{{ $total }}</td>
                    </tr>
                    @foreach ($value->receipt as $value1)
                        @php
                            $total = $total - $value1->discount;
                            $credit += $value1->discount;
                        @endphp
                        @if ($value1->discount > 0)
                            <tr>

                                <td>{{ $value1->date }}</td>
                                <td>Discount</td>
                                <td class="text-align-end">£0</td>
                                <td class="text-align-end">£{{ $value1->discount }}</td>
                                <td class="text-align-end">£{{ $total }}</td>
                            </tr>
                        @endif
                        @php
                            $total = $total + $value1->late_fee;
                            $debit += $value1->late_fee;

                        @endphp
                        @if ($value1->late_fee > 0)
                            <tr>

                                <td>{{ $value1->date }}</td>
                                <td>Late Fee</td>
                                <td class="text-align-end">£{{ $value1->late_fee }}</td>
                                <td class="text-align-end">£0</td>
                                <td class="text-align-end">£{{ $total }}</td>
                            </tr>
                        @endif
                        @php
                            $total = $total - $value1->amount;

                        @endphp
                        <tr>

                            <td>{{ $value1->date }}</td>
                            <td>{{ $value1->description }} {{ $value1->mode }}</td>
                            <td class="text-align-end">£0</td>
                            <td class="text-align-end">£{{ $value1->amount }}</td>
                            <td class="text-align-end">£{{ $total }}</td>


                        </tr>

                        @php
                            $grandTotal += $total;
                            $credit += $value1->amount;

                        @endphp
                    @endforeach
                @endforeach
                <tr class="bg-grey">
                    <th style="width: 15%;" class="text-center">

                    </th>
                    <th style="width: 15%;" class="text-center">

                    </th>
                    <th style="width: 25%;" class="text-center">

                    </th>
                    <th style="width: 15%;" class="text-align-end">£{{ $debit }}</th>
                    <th style="width: 15%;" class="text-align-end">£{{ $credit }}</th>
                    <th style="width: 15%;" class="text-align-end">£{{ $debit - $credit }}</th>
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
