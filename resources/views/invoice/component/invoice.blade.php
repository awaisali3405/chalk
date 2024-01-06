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
                                <b>Resource Invoice - Academic year
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
                    @elseif(str_contains($invoice->type, 'Debt Collection'))
                        <tr>
                            <td></td>
                            <td class="text-center">
                                <b> Debt Collection</b>
                            </td>

                            <td class="bg-grey"></td>
                            <td class="bg-grey"></td>
                            <td class="bg-grey"></td>
                        </tr>
                    @elseif(str_contains($invoice->type, 'Transferred Invoice'))
                        <tr>
                            <td></td>
                            <td class="text-center">
                                <b>Transferred Invoice</b>
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
                    @elseif (str_contains($invoice->type, 'Addition Book Invoice'))
                        <tr>
                            <td></td>
                            <td class="text-center">
                                <b>
                                    {{ auth()->user()->ukFormat($invoice->from_date) }} -
                                    {{ auth()->user()->ukFormat($invoice->to_date) }}
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
                            <td class="text-center bg-grey" style="text-align: end !important; padding-right:5px;">
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
                    @elseif ($invoice->type == 'Debt Collection')
                        <tr>
                            <td class="text-center">
                                <b>1</b>
                            </td>
                            <td class="pl-2 ">
                                <b> Debt Collection For Student</b>
                            </td>
                            <td class="text-center bg-grey">
                                <b>£{{ auth()->user()->priceFormat($invoice->amount) }}</b>
                            </td>
                            <td class="text-center bg-grey">
                                <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                            </td>
                            <td class="text-center bg-grey" style="text-align: end !important; padding-right:5px;">
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
                    @elseif ($invoice->type == 'Branch Transferred Invoice')
                        <tr>
                            <td class="text-center">
                                <b>1</b>
                            </td>
                            <td class="pl-2 ">
                                <b> {{ $invoice->description }}</b>
                            </td>
                            <td class="text-center bg-grey">
                                <b>£{{ auth()->user()->priceFormat($invoice->amount) }}</b>
                            </td>
                            <td class="text-center bg-grey">
                                <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                            </td>
                            <td class="text-center bg-grey" style="text-align: end !important; padding-right:5px;">
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
                                <td class="text-center bg-grey" style="text-align: end !important; padding-right:5px;">
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
                            $sr = $key + 1;
                        @endphp
                    @elseif (str_contains($invoice->type, 'Addition Invoice'))
                        @foreach ($invoice->subject as $key => $value)
                            <tr>
                                <td class="text-center">
                                    <b>{{ $key + 1 }}</b>
                                </td>
                                <td class="pl-2 ">
                                    <b>Lesson ({{ $value->subject_name }}) - {{ $value->subject_hr }}
                                        hours</b>
                                </td>
                                <td class="text-center text-center">
                                    <b>£{{ auth()->user()->priceFormat($value->subject_rate) }}</b>
                                </td>
                                <td class="text-center text-center">
                                    <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                                </td>
                                <td class=" bg-grey " style="text-align: end !important; padding-right:5px;">
                                    <b>£{{ auth()->user()->priceFormat($value->subject_amount) }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="pl-2">
                                    <h6>Period ({{ auth()->user()->ukFormat($invoice->from_date) }} -
                                        {{ auth()->user()->ukFormat($invoice->to_date) }}) </h6>
                                </td>
                                <td class="bg-grey">
                                    {{-- <h5 class=" text-center"> {{ $value->subject_hr }} hr</b> --}}

                                </td>
                                <td class="bg-grey"></td>
                                <td class="bg-grey"></td>
                            </tr>
                            @php
                                $sr = $key + 1;
                            @endphp
                        @endforeach
                    @elseif (str_contains($invoice->type, 'Addition Book Invoice'))
                        @foreach ($invoice->book as $key => $value)
                            <tr>
                                <td class="text-center">
                                    <b>{{ $key + 1 }}</b>
                                </td>
                                <td class="pl-2 ">
                                    <b>{{ $invoice->student->currentYear()->name }}
                                        ({{ $value->subject_name }} - {{ $value->book_name }})
                                        -
                                        {{ $value->quantity }}
                                        qty</b>
                                </td>
                                <td class="text-center text-center">
                                    <b>£{{ auth()->user()->priceFormat($value->rate) }}</b>
                                </td>
                                <td class="text-center text-center">
                                    <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                                </td>
                                <td class=" bg-grey " style="text-align: end !important; padding-right:5px;">
                                    <b>£{{ auth()->user()->priceFormat($value->amount) }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="pl-2">
                                    <h6>Period ({{ auth()->user()->ukFormat($invoice->from_date) }} -
                                        {{ auth()->user()->ukFormat($invoice->to_date) }}) </h6>
                                </td>
                                <td class="bg-grey">
                                    {{-- <h5 class=" text-center"> {{ $value->subject_hr }} hr</b> --}}

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
                            <td class="text-center bg-grey" style="text-align: end !important; padding-right:5px;">
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
                                    {{-- {{ $invoice->resourceInvoiceSubject()->first()->subject->book_rate * count($invoice->resourceInvoiceSubject) }} --}}
                                    £{{ auth()->user()->priceFormat($invoice->resourceInvoiceSubject()->first()->subject->book_rate) }}</b>
                            </td>
                            <td class="text-center bg-grey">
                                <b>{{ auth()->user()->priceFormat($invoice->tax) }}%</b>
                            </td>
                            <td class="text-center bg-grey" style="text-align: end !important; padding-right:5px;">
                                <b>
                                    £{{ auth()->user()->priceFormat($invoice->resourceInvoiceSubject()->first()->subject->book_rate * count($invoice->resourceInvoiceSubject)) }}</b>
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
                                        <b> £{{ auth()->user()->priceFormat($invoice->normalSubject()[0]->rate_per_hr) }}
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

                                        £{{ str_contains($invoice->type, 'Month')? (str_contains($invoice->student->currentYear()->name, '11')? auth()->user()->priceFormat((($invoice->normalSubject()->sum('amount') * 40) / 9) * $months): auth()->user()->priceFormat((($invoice->normalSubject()->sum('amount') * 52) / 12) * $months)): $invoice->normalSubject()->sum('amount') * $weeks }}
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="pl-2 pt-1">
                                    <h6>Period ({{ auth()->user()->ukFormat($invoice->from_date) }} -
                                        {{ auth()->user()->ukFormat($invoice->to_date) }}) </h6>
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
                                    <b>£{{ str_contains($invoice->type, 'Month')? (str_contains($invoice->student->currentYear()->name, '11')? auth()->user()->priceFormat((($invoice->oneOnOneSubject()->sum('amount') * 40) / 9) * $months, 2): auth()->user()->priceFormat((($invoice->oneOnOneSubject()->sum('amount') * 52) / 12) * $months, 2)): auth()->user()->priceFormat($invoice->oneOnOneSubject()->sum('amount') * $weeks) }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="pl-2 pt-1">
                                    <h6>Period ({{ auth()->user()->ukFormat($invoice->from_date) }} -
                                        {{ auth()->user()->ukFormat($invoice->to_date) }}) </h6>
                                </td>
                                <td class="bg-grey text-center">
                                    <h6>
                                        £{{ $invoice->oneOnOneSubject()->sum('amount') }}
                                        Weekly</h6>
                                </td>
                                <td class="bg-grey"></td>
                                <td class="bg-grey"></td>
                            </tr>
                        @endif
                        @if ($invoice->discount > 0 && !str_contains($invoice->type, 'Resource'))
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
                        @endif
                        @if ($invoice->receipt->sum('credit_discount') > 0)
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
                                    <b>Credit Note</b>
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
                                        -£{{ $invoice->receipt->sum('credit_discount') }}
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
                        @if ($invoice->refunded_discount > 0)
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
                                    <b>Refunded Discount</b>
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
                                        -£{{ auth()->user()->priceFormat($invoice->refunded_discount) }}
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
                        @if (
                            $invoice->receipt->sum('discount') > 0 ||
                                $invoice->receipt->sum('late_fee') > 0 ||
                                $invoice->receipt->sum('credit_discount') > 0 ||
                                $invoice->refunded_discount > 0 ||
                                $invoice->discount > 0)
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

                                        £{{ auth()->user()->priceFormat($invoice->amount + $invoice->receipt->sum('late_fee') - ($invoice->receipt->sum('discount') + $invoice->receipt->sum('credit_discount') + $invoice->refunded_discount)) }}
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
                            @if ($value->wallet_amount > 0)
                                <tr>
                                    <td class=" text-center">

                                    </td>
                                    <td class="pl-2">
                                        <b>Add to Student
                                            {{ $value->mode }} Wallet</b>
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

                                            £{{ auth()->user()->priceFormat($value->wallet_amount) }}
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
                            @endif
                        @endforeach
                        @foreach ($invoice->invoiceRefund as $value4)
                            <tr>
                                <td class=" text-center">

                                </td>
                                <td class="pl-2">
                                    <b>{{ $value4->description }}
                                        {{ $value4->mode }}</b>
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

                                        £{{ auth()->user()->priceFormat($value4->amount) }}
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="pl-2">
                                    <h6>{{ auth()->user()->ukFormat($value4->date) }}</h6>
                                </td>
                                <td class="bg-grey"></td>
                                <td class="bg-grey"></td>
                                <td class="bg-grey"></td>
                            </tr>
                        @endforeach
                        @foreach ($invoice->depositTransfer() as $key => $value)
                            <tr>
                                <td class=" text-center">

                                </td>
                                <td class="pl-2">
                                    <b> {{ $value->description }}
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


                                        £{{ auth()->user()->priceFormat($value->amount) }}
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
                    @if ($invoice->paidRefund)
                        <tr>
                            <td class=" text-center">

                            </td>
                            <td class="pl-2">
                                <b>
                                    Amount Refunded By
                                    {{ $invoice->paidRefund->mode() }}</b>
                            </td>
                            <td class="bg-grey">
                                <b></b>
                            </td>
                            <td class="bg-grey">
                                <b></b>
                            </td>
                            <td class="bg-grey text-center" style="text-align: end !important; padding-right:5px;">
                                <b>

                                    £{{ auth()->user()->priceFormat($invoice->amount) }}
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="pl-2">
                                <h6>{{ auth()->user()->ukFormat($invoice->paidRefund->updated_at) }}
                                </h6>
                            </td>
                            <td class="bg-grey"></td>
                            <td class="bg-grey"></td>
                            <td class="bg-grey"></td>
                        </tr>
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
                        <th class="text-center" style="text-align: end !important; padding-right:5px;">
                            £{{ auth()->user()->priceFormat($invoice->amount - $invoice->receipt->sum('discount') + $invoice->receipt->sum('late_fee')) }}
                        </th>
                    </tr>
                    <tr>
                        <td class="">
                            Invoice Balance
                        </td>
                        <th class="text-center" style="color:red; text-align: end !important; padding-right:5px;">

                            £{{ $invoice->remainingAmount() }}

                        </th>
                    </tr>
                    <tr>


                        <th class="" colspan="">
                            Vat Inclusive
                        </th>
                        <th class="text-center" style="text-align: end !important; padding-right:5px;">
                            £{{ auth()->user()->priceFormat($invoice->taxAmount()) }}
                        </th>
                    </tr>
                    <tr>
                        <th class="" colspan="">
                            Debit Brought Forward
                        </th>
                        <th class="text-center" style="text-align: end !important; padding-right:5px;">
                            £{{ auth()->user()->priceFormat($invoice->debitBroughtForward()) }}
                        </th>
                    </tr>
                    <tr>
                        <th class="" colspan="">
                            Wallet
                        </th>
                        <th class="text-center" style="text-align: end !important; padding-right:5px;">
                            £{{ auth()->user()->priceFormat($invoice->student->bank_balance + $invoice->student->cash_balance) }}
                        </th>
                    </tr>
                    <tr>
                        <th class="" colspan="">
                            Payment Due
                        </th>
                        <th class="text-center" style="text-align: end !important; padding-right:5px;">
                            £{{ auth()->user()->priceFormat($invoice->debitBroughtForward() + $invoice->remainingAmount()) }}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
