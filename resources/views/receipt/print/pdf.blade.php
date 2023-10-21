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
    <style>
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
            background-color: #A5A5A5;
        }

        .bg-grey {
            background-color: #d1cfcf;
        }

        .border-grey {
            border: 3px solid #A5A5A5;
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



<body class="pt-5" style="padding-left: 6rem!important; width:70%;">

    <div class="row">
        <div class="col-6">
            <h1 class="font-weight-bolder" style="font-size: 4rem;">
                Invoice</h1>
        </div>
        <div class="col-6 text-align-end">


            <img src="{{ asset('images/logo.png') }}" width="300" alt="">

        </div>

    </div>
    <div class="row pt-4">
        <div class="col-6">
            <div class="row">
                <div class="col-1">

                    <h3 class="font-weight-bolder">To:</h3>
                </div>
                <div class="pr-4 col-10">

                    <h3 class="">{{ $invoice->student->first_name }}
                        {{ $invoice->student->last_name }}</h3>
                    <h3 class="">{{ $invoice->student->branch->res_third_address }},
                        {{ $invoice->student->parents[0]->res_address }}</h3>
                    <h3 class="">{{ $invoice->student->parents[0]->res_second_address }}</h3>
                    <h3 class="">{{ $invoice->student->parents[0]->res_town }}</h3>
                    <h3 class="">{{ $invoice->student->parents[0]->res_postal_code }}</h3>
                </div>
            </div>
        </div>
        <div class="col-6 text-align-end">


            <h3 class="">
                {{ $invoice->student->branch->res_address }}</h3>
            <h3 class="">{{ $invoice->student->branch->res_second_address }}
            </h3>
            <h3 class="">{{ $invoice->student->branch->res_postal_code }},
                {{ $invoice->student->branch->res_town }}
            </h3>
            <h3 class="">United Kingdom</h3>

        </div>

    </div>
    <div class="row pt-3">
        <div class="col-6">
            <div class="row pl-3">
                <div class="col-4 p-0" style="width: 80%;">
                    <h3 class="font-weight-bolder">Attention To:</h3>
                </div>
                <div class="col-6">

                    <h3 class="font-weight-bolder">{{ $invoice->student->parents[0]->first_name }}
                        {{ $invoice->student->parents[0]->last_name }}</h3>
                </div>
            </div>
            <div class="row pl-3">

                <div class="col-12 p-0">

                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 40%">
                                    <h3 class="font-weight-bolder">Student ID</h3>
                                </td>
                                <td>
                                    <h3 class="font-weight-bolder">{{ $invoice->student->id }}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">
                                    <h3 class="font-weight-bolder">Student Year</h3>
                                </td>
                                <td>
                                    <h3 class="font-weight-bolder">{{ $invoice->student->year->name }}</h3>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6 pl-2 p-0">

            <table>
                <tbody>
                    <tr>
                        <td style="width: 40%">
                            <h3 class="font-weight-bolder">Roll No</h3>
                        </td>
                        <td class="text-align-end">
                            <h3 class="font-weight-bolder">{{ $invoice->student->id }}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%">
                            <h3 class="font-weight-bolder">Invoice Date</h3>
                        </td>
                        <td class="text-align-end">
                            <h3 class="font-weight-bolder">{{ $invoice->created_at->format('j-f-Y') }}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%">
                            <h3 class="font-weight-bolder">Invoice No</h3>
                        </td>
                        <td class="text-align-end">
                            <h3 class="font-weight-bolder">{{ $invoice->id }}</h3>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>




    </div>
    <div class="row pt-3 text-align-end">
        <div class="col-9"></div>
        <div class="col-3 pr-2 bg-dark-grey d-flex justify-content-center " style="width: 80%;">
            <h3 class="font-weight-bolder text-white pt-2" style="">Final Payment Date</h3>
        </div>
    </div>
    <div class="row text-align-end">
        <div class="col-9"></div>
        <div class="col-3 p-0 border-grey d-flex justify-content-center border-grey" style="width: 80%; height: 40px;">
            <h3 class="font-weight-bolder " style=""></h3>
        </div>
    </div>
    <div class="row">
        <table>
            <thead>
                <tr class="bg-grey">
                    <th style="width: 5%;">

                    </th>
                    <th class="text-center" style="width: 60%;">
                        <h3 class="font-weight-bolder"> Description</h3>
                    </th>
                    <th class="text-center" style="width: 20%;">
                        <h3 class="font-weight-bolder">Amount</h3>
                    </th>
                </tr>
            </thead>
            @php
                $description = '';
                if ($invoice->type == 'Refundable') {
                    $description = 'Deposit (Refundable)';
                }
            @endphp
            <tbody>
                <tr class="">
                    <td class="text-center">
                        <h3 class="font-weight-bolder"></h3>
                    </td>
                    <td class="pl-2 ">
                        <h3 class="font-weight-bolder"> </h3>
                    </td>
                    <td class="text-align-end bg-grey">
                        <h3 class="font-weight-bolder text-grey">sadas</h3>
                    </td>
                </tr>
                <tr class="bg-grey">
                    <td class="text-center">
                        <h3 class="font-weight-bolder">1</h3>
                    </td>
                    <td class="pl-2 ">
                        <h3 class="font-weight-bolder"> {{ $description }}</h3>
                    </td>
                    <td class="text-align-end bg-grey">
                        <h3 class="font-weight-bolder">£{{ $invoice->amount }}</h3>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="pl-2">
                        <h3 class="">Until {{ $invoice->to_date }} </h3>
                    </td>
                    <td class="bg-grey"></td>
                </tr>
                @php
                    $sr = 2;
                @endphp
                @if (count($invoice->receipt) > 0)
                    @foreach ($invoice->receipt as $key => $value)
                        @if ($value->discount > 0)
                            <tr class="bg-grey">
                                <td class=" text-center">
                                    <h3 class="font-weight-bolder">
                                        {{ $sr++ }}

                                    </h3>
                                </td>
                                <td class="pl-2">
                                    <h3 class="font-weight-bolder">Discount</h3>
                                </td>
                                <td class="bg-grey text-align-end">
                                    <h3 class="font-weight-bolder">

                                        -£{{ $value->discount }}
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="pl-2">
                                    <h3 class="text-white">{{ $value->date }}</h3>
                                </td>
                                <td></td>
                            </tr>
                        @endif
                        @if ($value->late_fee > 0)
                            <tr class="bg-grey">
                                <td class=" text-center">
                                    <h3 class="font-weight-bolder">
                                        {{ $sr++ }}

                                    </h3>
                                </td>
                                <td class="pl-2">
                                    <h3 class="font-weight-bolder">Late Payment Charges</h3>
                                </td>
                                <td class="bg-grey text-align-end">
                                    <h3 class="font-weight-bolder">

                                        £{{ $value->late_fee }}
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="pl-2">
                                    <h3 class="text-white">{{ $value->date }}</h3>
                                </td>
                                <td></td>
                            </tr>
                        @endif
                        <tr class="bg-grey">
                            <td class=" text-center">
                                <h3 class="font-weight-bolder">

                                    {{ $sr++ }}
                                </h3>
                            </td>
                            <td class="pl-2">
                                <h3 class="font-weight-bolder">{{ $value->description }} {{ $value->mode }}</h3>
                            </td>
                            <td class="bg-grey text-align-end">
                                <h3 class="font-weight-bolder">

                                    -£{{ $value->amount }}
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="pl-2">
                                <h3 class="">{{ $value->date }}</h3>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <th>

                    </th>
                    <th class="text-align-end">
                        <h3 class="font-weight-bolder">Total</h3>
                    </th>
                    <th class="bg-grey text-align-end">
                        <h3 class="font-weight-bolder">£{{ $invoice->amount }}</h3>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row pt-3">
        <div class="col-12">
            <h3 class="font-weight-bolder">Term & Condition</h3>
            <p class="justify-end">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam debitis
                voluptatibus tempore enim
                voluptates dicta a ullam iste consequuntur placeat ratione est modi commodi nihil aliquam numquam,
                veritatis ipsam obcaecati? Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure corporis
                recusandae eos atque quisquam fugiat, velit consequatur beatae id perspiciatis laborum aliquid rem
                doloremque quis blanditiis aperiam dolorem excepturi voluptas!</p>
        </div>
    </div>
    <div class="row border-black p-0 font-weight-bolder">
        <div class="col-12 p-0">
            <p class="text-center mb-0">

                Bank Details: Company Name:
                {{ $invoice->student->branch->name }} Acc No.
                {{ $invoice->student->branch->account_number }}
                Sort Code: {{ $invoice->student->branch->short_code }} Reference:
                {{ $invoice->student->parents[0]->first_name }} {{ $invoice->student->parents[0]->last_name }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="mb-0 text-center pt-5">Should you have any query converning this invoice/receipt, please contact
                us on
                02085777077 or 07535050502 </p>
            <p class="font-weight-bolder text-center pt-4">Thank you for your business!</p>
            <p class="text-center font-weight-bolder">Company Registration Number:
                {{ $invoice->student->branch->company_number }}</p>
        </div>
    </div>
</body>

</html>
