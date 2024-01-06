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

<body style="background-color:white; width:90%; margin: auto;">
    <div class="row">
        <div class="col-6 ">
            <img src="{{ asset('images/logo.png') }}" width="300" alt="">
        </div>
        <div class="col-6  text-center">
            <h4 class="font-weight-bolder p-0 text-blue " style="font-size: 4rem;">
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
                    <h6>{{ $invoice->student->parents[0]->name() }}</h6>
                    <h6>
                        {{ $invoice->student->parents[0]->res_second_address }}
                    </h6>
                    <h6>{{ $invoice->student->parents[0]->res_third_address }}
                    </h6>
                    <h6>
                        {{ $invoice->student->parents[0]->res_address }}</h6>
                    <h6>{{ $invoice->student->parents[0]->res_town }}</h6>
                    <h6>
                        {{ $invoice->student->parents[0]->res_postal_code }}</h6>
                    <h6>
                        Email: {{ $invoice->student->parents[0]->email }}
                    </h6>
                    <h6 class="">
                        Phone: {{ $invoice->student->parents[0]->mobile_number }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-6 pr-4">
            <div class="border-black row pl-3">
                <div class="pr-1 col-12">
                    <h6 style="text-align: end !important; padding-right:5px;">
                        From: {{ $invoice->student->branch->res_address }}</h6>
                    <h6 style="text-align: end !important; padding-right:5px;">
                        {{ $invoice->student->branch->res_second_address }}
                        ,{{ $invoice->student->branch->res_third_address }}
                    </h6 style="text-align: end !important; padding-right:5px;">
                    <h6 style="text-align: end !important; padding-right:5px;">
                        {{ $invoice->student->branch->res_town }},
                        {{ $invoice->student->branch->res_postal_code }}
                    </h6 style="text-align: end !important; padding-right:5px;">
                    <h6 style="text-align: end !important; padding-right:5px;">
                        Email: {{ $invoice->student->branch->email }}
                    </h6>
                    <h6 style="text-align: end !important; padding-right:5px;">
                        Phone: {{ $invoice->student->branch->phone_number }}
                    </h6>
                    <h6 style="text-align: end !important; padding-right:5px;">
                        Company No: {{ $invoice->student->branch->company_number }}
                    </h6>
                    <h6 style="text-align: end !important; padding-right:5px;">
                        VAT reg No: {{ $invoice->student->branch->vat_reg_no }}
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
                                    <b>{{ $invoice->student->currentRollNo() }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Student Year</b>
                                </td>
                                <td>
                                    <b>{{ $invoice->year->name }}
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
                                {{ auth()->user()->ukFormat($invoice->date ? $invoice->date : $invoice->created_at) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%">
                            <b>Invoice No</b>
                        </td>
                        <td class="text-center">
                            <b>{{ $invoice->code }}</b>
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
                        <th>Final Paid Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">

                            {{ \Carbon\Carbon::parse($invoice->date)->addDays(7)->format('d/m/Y') }}
                        </td>
                        <td>
                            {{ $invoice->is_paid && $invoice->receipt->count() > 0? auth()->user()->ukFormat($invoice->receipt[$invoice->receipt->count() - 1]->date): '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    @include('invoice.component.invoice')
    <div class="row pt-3">
        <div class="col-12">
            <b>Terms & Condition</b>
            <p class="justify-end " style="font-size: x-small;">Once you pay your deposit, you have agreed
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
    <div class="row">
        <div class="col-12 d-flex justify-content-center" style="border: 2px solid black;">
            <p style="font-size: 12px; padding-bottom:0px;">

                Bank Details: {{ $invoice->branch->bank_name }} ,Company Name:
                {{ $invoice->branch->name }},
                Acc No:
                {{ $invoice->branch->account_number }}, Sort Code: {{ $invoice->branch->branch_code }},
                Reference:{{ $invoice->student->name() }}
            </p>
        </div>
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
