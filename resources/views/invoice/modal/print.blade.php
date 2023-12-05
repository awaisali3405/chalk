@php
    $invoice = $value;
@endphp
<div class="modal fade print printme" id="print-{{ $value->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-between">
                <h5 class="modal-title">Invoice # {{ $value->code }}</b></h5>
                <a href="{{ route('invoice.print', $invoice->id) }}" target="_blank"
                    class="btn btn-primary  importStyle">Print</a>
            </div>
            <div class="modal-body">
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
                                <h6>{{ $invoice->student->parents[0]->first_name }}
                                    {{ $invoice->student->parents[0]->last_name }}</h6>
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
                                    {{ $invoice->student->branch->res_postal_code }},
                                    {{ $invoice->student->branch->res_town }}
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
                                            {{ auth()->user()->ukFormat($invoice->created_at) }}</b>
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

                                        {{ \Carbon\Carbon::parse($invoice->created_at->addDays(7))->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        {{ $invoice->is_paid? auth()->user()->ukFormat($invoice->receipt[$invoice->receipt->count() - 1]->date): '' }}
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
                                            Description
                                        </th>
                                        <th class="">
                                            Rate
                                        </th>
                                        <th>
                                            VAT%
                                        </th>
                                        <th class="">
                                            Amount
                                        </th>
                                    </tr>
                                </thead>

                                @php
                                    $to = \Carbon\Carbon::parse($invoice->from_date);
                                    $from = \Carbon\Carbon::parse($invoice->to_date);

                                    $weeks = $to->diffInWeeks($from->addDay(1));
                                    $months = $to->diffInMonths($from->addDay(1));
                                    $sr = 0;
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
                                    @elseif(str_contains($invoice->type, 'Month'))
                                        <tr>
                                            <td></td>
                                            <td class="text-center">
                                                <b>{{ $months }} Month</b>
                                            </td>

                                            <td class="bg-grey"></td>
                                            <td class="bg-grey"></td>
                                            <td class="bg-grey"></td>
                                        </tr>
                                    @elseif (str_contains($invoice->type, 'Addition Invoice'))
                                        <tr>
                                            <td></td>
                                            <td class="text-center">
                                                <b>Fee
                                                    ({{ auth()->user()->ukFormat($invoice->from_date) }} -
                                                    {{ auth()->user()->ukFormat($invoice->to_date) }})
                                                </b>
                                            </td>

                                            <td class="bg-grey"></td>
                                            <td class="bg-grey"></td>
                                            <td class="bg-grey"></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td class="text-center text-white">
                                                blank
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
                                                <b>£{{ auth()->user()->priceFormat($invoice->amount) }}</b>
                                            </td>
                                            <td class="text-center bg-grey">
                                                <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                                            </td>
                                            <td class="text-center bg-grey"
                                                style="text-align: end !important; padding-right:5px;">
                                                <b>£{{ auth()->user()->priceFormat($invoice->amount) }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="pl-2 pt-1 text-white">
                                                blank
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
                                                    <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                                                </td>
                                                <td class="text-center bg-grey"
                                                    style="text-align: end !important; padding-right:5px;">
                                                    <b>£{{ auth()->user()->priceFormat($value->amount) }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="pl-2">
                                                </td>
                                                <td class="bg-grey text-center">
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
                                                    <b>£{{ auth()->user()->priceFormat($value->subject_rate) }}</b>
                                                </td>
                                                <td class="text-center text-center">
                                                    <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                                                </td>
                                                <td class=" bg-grey "
                                                    style="text-align: end !important; padding-right:5px;">
                                                    <b>£{{ $value->subject_amount }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="pl-2">
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
                                                <b>£{{ auth()->user()->priceFormat($invoice->amount) }}</b>
                                            </td>
                                            <td class="text-center bg-grey">
                                                <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                                            </td>
                                            <td class="text-center bg-grey"
                                                style="text-align: end !important; padding-right:5px;">
                                                <b>£{{ auth()->user()->priceFormat($invoice->amount) }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="pl-2 pt-1 text-white">
                                                blanck
                                            </td>
                                            <td class="bg-grey"></td>
                                            <td class="bg-grey"></td>
                                            <td class="bg-grey"></td>
                                        </tr>
                                        @php
                                            $sr = 2;
                                        @endphp
                                    @elseif (str_contains($invoice->type, 'Resource Fee'))
                                        @foreach ($invoice->resourceInvoiceSubject as $key => $value)
                                            @php
                                                $sr++;
                                            @endphp
                                            <tr class="">
                                                <td class="text-center">
                                                    <b>{{ $sr }}</b>
                                                </td>
                                                <td class="pl-2 ">
                                                    <b>{{ $value->subject->name }} Resources
                                                    </b>
                                                </td>
                                                <td class="text-center bg-grey">
                                                    <b>£{{ auth()->user()->priceFormat($value->subject->rate) }}</b>
                                                </td>
                                                <td class="text-center bg-grey">
                                                    <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                                                </td>
                                                <td class="text-center bg-grey"
                                                    style="text-align: end !important; padding-right:5px;">
                                                    <b>£{{ auth()->user()->priceFormat($value->subject->rate) }}</b>
                                                </td>
                                            </tr>
                                            <tr class="">
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
                                        @endforeach
                                        @php
                                            $sr++;
                                        @endphp
                                        <tr class="">
                                            <td class="text-center">
                                                <b>{{ $sr++ }}</b>
                                            </td>
                                            <td class="pl-2 pt-1">
                                                <b>Exercise Book (Quantity x
                                                    {{ count($invoice->resourceInvoiceSubject) }}
                                                    )
                                                </b>
                                            </td>
                                            <td class="text-center bg-grey">
                                                <b>
                                                    {{-- {{ $invoice->resourceInvoiceSubject[0]->subject->book_rate * count($invoice->resourceInvoiceSubject) }} --}}
                                                    £{{ auth()->user()->priceFormat($invoice->resourceInvoiceSubject[0]->subject->book_rate) }}</b>
                                            </td>
                                            <td class="text-center bg-grey">
                                                <b></b>
                                            </td>
                                            <td class="text-center bg-grey"
                                                style="text-align: end !important; padding-right:5px;">
                                                <b>
                                                    £{{ auth()->user()->priceFormat($invoice->resourceInvoiceSubject[0]->subject->book_rate * count($invoice->resourceInvoiceSubject)) }}</b>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr class="">
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
                                    @elseif (str_contains($invoice->type, 'Fee'))
                                        @php
                                            $sr++;
                                        @endphp
                                        @if (count($invoice->normalSubject()) > 0)

                                            <tr>
                                                <td class="text-center">
                                                    <b>{{ $sr }}</b>
                                                </td>
                                                <td class="pl-2">
                                                    <b> Lesson ( @foreach ($invoice->normalSubject() as $key => $value)
                                                            {{ $value->subject->name }}@if ($key + 1 != count($invoice->normalSubject()))
                                                                ,
                                                            @endif
                                                        @endforeach ) -
                                                        {{ $invoice->normalSubject()->sum('no_hr_weekly') }}
                                                        hours/week </b>
                                                </td>
                                                <td class="text-center bg-grey">
                                                    <h6>
                                                        <b> £{{ $invoice->normalSubject()[0]->rate_per_hr }}
                                                        </b>
                                                    </h6>
                                                </td>
                                                <td class="text-center bg-grey">
                                                    <h6>
                                                        <b> {{ auth()->user()->priceFormat($invoice->tax) }}% </b>
                                                    </h6>
                                                </td>
                                                <td class="text-center bg-grey"
                                                    style="text-align: end !important; padding-right:5px;">
                                                    <b>

                                                        £{{ str_contains($invoice->type, 'Month')? (str_contains($invoice->student->year->name, '11')? auth()->user()->priceFormat((($invoice->normalSubject()->sum('amount') * 40) / 9) * $months): auth()->user()->priceFormat((($invoice->normalSubject()->sum('amount') * 52) / 12) * $months)): $invoice->normalSubject()->sum('amount') * $weeks }}
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="pl-2 pt-1">
                                                    {{-- <h6>Period( {{ auth()->user()->ukFormat($invoice->from_date) }} -
                                                        {{ auth()->user()->ukFormat($invoice->to_date) }}) </h6> --}}
                                                </td>
                                                <td class="bg-grey text-center">
                                                    <h6>
                                                        £{{ $invoice->normalSubject()->sum('amount') }}
                                                        Weekly</h6>
                                                </td>
                                                <td class="bg-grey"></td>
                                                <td class="bg-grey"></td>
                                            </tr>
                                        @endif
                                        @if (count($invoice->oneOnOneSubject($invoice->id)) > 0)
                                            @php
                                                $sr++;
                                            @endphp

                                            <tr>
                                                <td class="text-center">
                                                    <b>{{ $sr }}</b>
                                                </td>
                                                <td class="pl-2 ">
                                                    <b> 1 - 1( @foreach ($invoice->oneOnOneSubject($invoice->id) as $key => $value)
                                                            {{ $value->subject->name }}@if ($key + 1 != count($invoice->oneOnOneSubject($invoice->id)))
                                                                ,
                                                            @endif
                                                        @endforeach ) </b>
                                                </td>
                                                <td class="text-center bg-grey">
                                                    <b>£{{ auth()->user()->priceFormat($invoice->oneOnOneSubject($invoice->id)[0]->rate_per_hr) }}</b>
                                                </td>
                                                <td class="text-center bg-grey">
                                                    <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                                                </td>
                                                <td class="text-center bg-grey"
                                                    style="text-align: end !important; padding-right:5px;">
                                                    <b>£{{ str_contains($invoice->type, 'Month')? (str_contains($invoice->year->name, '11')? auth()->user()->priceFormat((($invoice->oneOnOneSubject()->sum('amount') * 40) / 9) * $months, 2): auth()->user()->priceFormat((($invoice->oneOnOneSubject()->sum('amount') * 52) / 12) * $months, 2)): auth()->user()->priceFormat($invoice->oneOnOneSubject()->sum('amount') * $weeks) }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="pl-2 pt-1">

                                                </td>
                                                <td class="bg-grey">
                                                    <h6>£{{ $invoice->oneOnOneSubject()->sum('amount') }}
                                                        Weekly</h6>
                                                </td>
                                                <td class="bg-grey"></td>
                                                <td class="bg-grey"></td>
                                            </tr>
                                        @endif
                                        @if ($invoice->student->fee_discount > 0 && !str_contains($invoice->type, 'Resource'))
                                            @php
                                                $sr++;
                                            @endphp
                                            <tr>
                                                <td class=" text-center">
                                                    <b>
                                                        {{ $sr }}

                                                    </b>
                                                </td>
                                                <td class="pl-2">
                                                    <b>Discount</b>
                                                </td>
                                                <td class="bg-grey">
                                                    <b></b>
                                                </td>
                                                <td class="bg-grey text-center">
                                                    <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                                                </td>
                                                <td class="bg-grey text-center"
                                                    style="text-align: end !important; padding-right:5px;">
                                                    <b>
                                                        @if (str_contains($invoice->type, 'Week'))
                                                            -£{{ auth()->user()->priceFormat($invoice->student->fee_discount * $weeks) }}
                                                        @else
                                                            -£{{ auth()->user()->priceFormat($invoice->student->fee_discount) }}
                                                        @endif
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
                                    @endif


                                    @if (count($invoice->receipt) > 0)
                                        @if ($invoice->receipt->sum('late_fee') > 0)
                                            @php
                                                $sr++;
                                            @endphp
                                            <tr class="">
                                                <td class=" text-center">
                                                    <b>
                                                        {{ $sr }}

                                                    </b>
                                                </td>
                                                <td class="pl-2">
                                                    <b>Late Payment Charges</b>
                                                </td>
                                                <td class="bg-grey">
                                                    <b></b>
                                                </td>
                                                <td class="bg-grey text-center">
                                                    <b>{{ $invoice->student->branch->tax_type == 'flat'? auth()->user()->priceFormat($invoice->student->branch->tax): 0 }}%</b>
                                                </td>
                                                <td class="bg-grey text-center"
                                                    style="text-align: end !important; padding-right:5px;">
                                                    <b>

                                                        £{{ $invoice->receipt->sum('late_fee') }}
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class=" text-center">

                                                </td>
                                                <td class="pl-2 pt-1">
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
                                            @php
                                                $sr++;
                                            @endphp
                                            <tr>
                                                <td class=" text-center">
                                                    <b>
                                                        {{ $sr }}

                                                    </b>
                                                </td>
                                                <td class="pl-2">
                                                    <b>Discount</b>
                                                </td>
                                                <td class="bg-grey">
                                                    <b></b>
                                                </td>
                                                <td class="bg-grey text-center">
                                                    <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                                                </td>
                                                <td class="bg-grey text-center"
                                                    style="text-align: end !important; padding-right:5px;">
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
                                                <td class="bg-grey text-center"
                                                    style="text-align: end !important; padding-right:5px;">
                                                    <b>

                                                        £{{ auth()->user()->priceFormat($invoice->amount - ($invoice->receipt->sum('discount') + $invoice->receipt->sum('late_fee'))) }}
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
                                                <td class="bg-grey text-center"
                                                    style="text-align: end !important; padding-right:5px;">
                                                    <b>

                                                        -£{{ auth()->user()->priceFormat($value->amount) }}
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="pl-2">
                                                    <h6>{{ auth()->user()->ukFormat($value->date) }}</h6>
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
                                        <th class="text-center"
                                            style="text-align: end !important; padding-right:5px;">

                                            £{{ auth()->user()->priceFormat($invoice->amount - $invoice->receipt->sum('discount') + $invoice->receipt->sum('late_fee')) }}

                                        </th>
                                    </tr>
                                    <tr>


                                        <td class="">
                                            Invoice Balance
                                        </td>
                                        <th class="text-center"
                                            style="color:red; text-align: end !important; padding-right:5px;">

                                            £{{ $invoice->remainingAmount() }}

                                        </th>
                                    </tr>
                                    <tr>


                                        <th class="" colspan="">
                                            Vat Inclusive
                                        </th>
                                        <th class="text-center"
                                            style="text-align: end !important; padding-right:5px;">

                                            £{{ auth()->user()->priceFormat($invoice->taxAmount()) }}

                                        </th>
                                    </tr>
                                    <tr>


                                        <th class="" colspan="">
                                            Debit Brought Forward
                                        </th>
                                        <th class="text-center"
                                            style="text-align: end !important; padding-right:5px;">

                                            £{{ auth()->user()->priceFormat($invoice->debitBroughtForward()) }}

                                        </th>
                                    </tr>
                                    <tr>


                                        <th class="" colspan="">
                                            Payment Due
                                        </th>
                                        <th class="text-center"
                                            style="text-align: end !important; padding-right:5px;">

                                            £{{ auth()->user()->priceFormat($invoice->debitBroughtForward() + $invoice->remainingAmount()) }}

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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
