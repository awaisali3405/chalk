@php
    $invoice = $value;
@endphp
<div class="modal fade print printme" id="print-{{ $value->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invoice # {{ $value->id }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <h3 class="font-weight-bolder" style="font-size: 4rem;">
                            {{ count($invoice->receipt) > 0 ? 'Receipt' : 'Invoice' }}</h3>
                    </div>
                    <div class="col-6 text-align-end">


                        <img src="{{ asset('images/logo.png') }}" width="300" alt="">

                    </div>

                </div>
                <div class="row pt-4">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-1">

                                <h5 class="font-weight-bolder">To:</h5>
                            </div>
                            <div class="pr-4 col-10">

                                <h5 class="">{{ $invoice->student->first_name }}
                                    {{ $invoice->student->last_name }}</h5>
                                <h5 class="">{{ $invoice->student->branch->res_third_address }},
                                    {{ $invoice->student->parents[0]->res_address }}</h5>
                                <h5 class="">{{ $invoice->student->parents[0]->res_second_address }}</h5>
                                <h5 class="">{{ $invoice->student->parents[0]->res_town }}</h5>
                                <h5 class="">{{ $invoice->student->parents[0]->res_postal_code }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 text-align-end">


                        <h5 class="">
                            {{ $invoice->student->branch->res_address }}</h5>
                        <h5 class="">{{ $invoice->student->branch->res_second_address }}
                        </h5>
                        <h5 class="">{{ $invoice->student->branch->res_postal_code }},
                            {{ $invoice->student->branch->res_town }}
                        </h5>
                        <h5 class="">United Kingdom</h5>

                    </div>

                </div>
                <div class="row pt-3">
                    <div class="col-6">
                        <div class="row pl-3">
                            <div class="col-4 p-0" style="width: 80%;">
                                <h5 class="font-weight-bolder">Attention To:</h5>
                            </div>
                            <div class="col-6">

                                <h5 class="font-weight-bolder">{{ $invoice->student->parents[0]->first_name }}
                                    {{ $invoice->student->parents[0]->last_name }}</h5>
                            </div>
                        </div>
                        <div class="row pl-3">

                            <div class="col-12 p-0 table-responsive">
                                <table class="table table-striped ">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 class="font-weight-bolder">Student ID</h5>
                                            </td>
                                            <td>
                                                <h5 class="font-weight-bolder">{{ $invoice->student->id }}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-weight-bolder">Student Year</h5>
                                            </td>
                                            <td>
                                                <h5 class="font-weight-bolder">{{ $invoice->student->year->name }}</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pl-2 p-0 table-responsive">
                        <table class="table table-striped ">
                            <tbody>
                                <tr>
                                    <td style="width: 40%">
                                        <h5 class="font-weight-bolder">Roll No</h5>
                                    </td>
                                    <td class="text-align-end">
                                        <h5 class="font-weight-bolder">{{ $invoice->student->id }}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">
                                        <h5 class="font-weight-bolder">Invoice Date</h5>
                                    </td>
                                    <td class="text-align-end">
                                        <h5 class="font-weight-bolder">
                                            {{ \Carbon\Carbon::parse($invoice->created_at)->format('j-F-Y') }}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">
                                        <h5 class="font-weight-bolder">Invoice No</h5>
                                    </td>
                                    <td class="text-align-end">
                                        <h5 class="font-weight-bolder">{{ $invoice->id }}</h5>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>




                </div>
                <div class="row pt-3 text-align-end">
                    <div class="col-9"></div>
                    <div class="col-3 pr-2 bg-dark-grey d-flex justify-content-center " style="width: 80%;">
                        <h5 class="font-weight-bolder text-white pt-2" style="">Final Payment Date</h5>
                    </div>
                </div>
                <div class="row text-align-end">
                    <div class="col-9"></div>
                    <div class="col-3 p-0 border-grey d-flex justify-content-center border-grey"
                        style="width: 80%; height: 40px;">
                        <h5 class="font-weight-bolder " style=""></h5>
                    </div>
                </div>
                <div class="row table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <tr class="bg-grey">
                                <th style="width: 5%;">

                                </th>
                                <th class="" style="width: 60%;">
                                    <h5 class="font-weight-bolder"> Description</h5>
                                </th>
                                <th class="" style="width: 20%;">
                                    <h5 class="font-weight-bolder">Rate</h5>
                                </th>
                                <th>
                                    <h5 class="font-weight-bolder"> Tax</h5>
                                </th>
                                <th class="" style="width: 20%;">
                                    <h5 class="font-weight-bolder">Amount</h5>
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
                                        <h4 class="">Resource Invoice - Academaic year
                                            {{ date('Y', strtotime($invoice->from_date)) }}/{{ date('Y', strtotime($invoice->to_date)) }}
                                        </h4>
                                    </td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                            @elseif (str_contains($invoice->type, 'Sale Invoice'))
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <h4 class="">Sale Invoice
                                            {{ date('Y', strtotime($invoice->from_date)) }}/{{ date('Y', strtotime($invoice->to_date)) }}
                                        </h4>
                                    </td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                            @elseif(str_contains($invoice->type, 'Week'))
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <h5 class="font-weight-bolder">{{ $weeks }} Week</h5>
                                    </td>

                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                            @elseif (str_contains($invoice->type, 'Addition Invoice'))
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <h5 class="font-weight-bolder">Additional Invoice ({{ $invoice->from_date }} -
                                            {{ $invoice->to_date }})
                                        </h5>
                                    </td>

                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                            @else
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <h5 class="font-weight-bolder">{{ $months }}
                                            Month{{ $months > 1 ? 's' : '' }}</h5>
                                    </td>

                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                    <td class="bg-grey"></td>
                                </tr>
                            @endif
                            @if ($invoice->type == 'Refundable')

                                <tr class="bg-grey">
                                    <td class="text-center">
                                        <h5 class="font-weight-bolder">1</h5>
                                    </td>
                                    <td class="pl-2 ">
                                        <h5 class="font-weight-bolder"> Deposit (Refundable)</h5>
                                    </td>
                                    <td class="text-align-end bg-grey">
                                        <h5 class="font-weight-bolder">£{{ $invoice->amount }}</h5>
                                    </td>
                                    <td class="text-align-end bg-grey">
                                        <h5 class="font-weight-bolder">{{ $invoice->tax }}%</h5>
                                    </td>
                                    <td class="text-align-end bg-grey">
                                        <h5 class="font-weight-bolder">£{{ $invoice->amount }}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="pl-2">
                                        <h5 class="">Until {{ $invoice->to_date }} </h5>
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
                                    <tr class="bg-grey">
                                        <td class="text-center">
                                            <h5 class="font-weight-bolder">{{ $key + 1 }}</h5>
                                        </td>
                                        <td class="pl-2 ">
                                            <h5 class="font-weight-bolder"> {{ $value->product->name }}</h5>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <h5 class="font-weight-bolder">£{{ $value->rate }}</h5>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <h5 class="font-weight-bolder">{{ $invoice->tax }}%</h5>
                                        </td>
                                        <td class="text-align-end bg-grey">
                                            <h5 class="font-weight-bolder">£{{ $value->amount }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                        </td>
                                        <td class="bg-grey text-center">
                                            <h5 class="">{{ $value->quantity }} Qty </h5>

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
                                    <tr class="bg-grey">
                                        <td class="text-center">
                                            <h5 class="font-weight-bolder">{{ $key + 1 }}</h5>
                                        </td>
                                        <td class="pl-2 ">
                                            <h5 class="font-weight-bolder"> {{ $value->subject_name }}</h5>
                                        </td>
                                        <td class="text-align-end text-center">
                                            <h5 class="font-weight-bolder">£{{ $value->subject_rate }}</h5>
                                        </td>
                                        <td class="text-align-end text-center">
                                            <h5 class="font-weight-bolder">{{ $invoice->tax }}%</h5>
                                        </td>
                                        <td class="text-align-end bg-grey">
                                            <h5 class="font-weight-bolder">£{{ $value->subject_amount }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                            {{-- <h5 class="">Until {{ $invoice->to_date }} </h5> --}}
                                        </td>
                                        <td class="bg-grey">
                                            <h5 class=" text-center"> {{ $value->subject_hr }} hr</h5>

                                        </td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                    </tr>
                                    @php
                                        $sr = $key + 1;
                                    @endphp
                                @endforeach
                            @elseif(str_contains($invoice->type, 'Registration'))
                                <tr class="bg-grey">
                                    <td class="text-center">
                                        <h5 class="font-weight-bolder">1</h5>
                                    </td>
                                    <td class="pl-2 ">
                                        <h5 class="font-weight-bolder"> Registration (Non-Refundable)</h5>
                                    </td>
                                    <td class="text-align-end bg-grey">
                                        <h5 class="font-weight-bolder">£{{ $invoice->amount }}</h5>
                                    </td>
                                    <td class="text-align-end bg-grey">
                                        <h5 class="font-weight-bolder">{{ $invoice->tax }}%</h5>
                                    </td>
                                    <td class="text-align-end bg-grey">
                                        <h5 class="font-weight-bolder">£{{ $invoice->amount }}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="pl-2">
                                        <h5 class="">Until {{ $invoice->to_date }} </h5>
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
                                            <h5 class="font-weight-bolder">{{ $key + 1 }}</h5>
                                        </td>
                                        <td class="pl-2 ">
                                            <h5 class="font-weight-bolder">{{ $value->subject_name }} Resources</h5>
                                        </td>
                                        <td class="text-align-end bg-grey">
                                            <h5 class="font-weight-bolder">£{{ $value->subject_rate }}</h5>
                                        </td>
                                        <td class="text-align-end bg-grey">
                                            <h5 class="font-weight-bolder">{{ $invoice->tax }}%</h5>
                                        </td>
                                        <td class="text-align-end bg-grey">
                                            <h5 class="font-weight-bolder">£{{ $value->subject_rate }}</h5>
                                        </td>
                                    </tr>

                                    @php
                                        $sr = $key + 1;
                                    @endphp
                                @endforeach
                                <tr class="">
                                    <td class="text-center">
                                        <h5 class="font-weight-bolder">{{ $sr + 1 }}</h5>
                                    </td>
                                    <td class="pl-2 ">
                                        <h5 class="font-weight-bolder">Exercise Book (Quantity x
                                            {{ count($invoice->subject) }} )
                                        </h5>
                                    </td>
                                    <td class="text-align-end bg-grey">
                                        <h5 class="font-weight-bolder"></h5>
                                    </td>
                                    <td class="text-align-end bg-grey">
                                        <h5 class="font-weight-bolder"></h5>
                                    </td>
                                    <td class="text-align-end bg-grey">
                                        <h5 class="font-weight-bolder">
                                            £{{ $invoice->subject->sum('subject_book_fee') }}</h5>
                                    </td>
                                </tr>

                                @php
                                    $sr = 2;
                                @endphp
                            @elseif (str_contains($invoice->type, 'Fee'))
                                {{-- @dd($invoice->student->enquirySubject) --}}
                                @if (count($invoice->student->oneOnOneSubject()) < 1)

                                    <tr class="bg-grey">
                                        <td class="text-center">
                                            <h5 class="font-weight-bolder">1</h5>
                                        </td>
                                        <td class="pl-2 ">
                                            <h5 class="font-weight-bolder"> Lesson ( @foreach ($invoice->student->normalSubject() as $key => $value)
                                                    {{ $value->subject->name }}@if ($key + 1 != count($invoice->student->normalSubject()))
                                                        ,
                                                    @endif
                                                @endforeach ) -
                                                {{ $invoice->student->normalSubject()->sum('no_hr_weekly') }}
                                                hours/week </h5>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <h5 class="">
                                                £{{ $invoice->student->normalSubject()[0]->rate_per_hr }}</h5>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <h5 class="">
                                                {{ $invoice->tax }}</h5>
                                        </td>
                                        <td class="text-align-end bg-grey">
                                            <h5 class="font-weight-bolder">

                                                £{{ str_contains($invoice->type, 'Month') ? (str_contains($invoice->student->year->name, '11') ? number_format((($invoice->student->normalSubject()->sum('amount') * 40) / 9) * $months, 2) : number_format((($invoice->student->normalSubject()->sum('amount') * 52) / 12) * $months, 2)) : $invoice->student->normalSubject()->sum('amount') * $weeks }}
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                            <h5 class="">Period {{ $invoice->from_date }} -
                                                {{ $invoice->to_date }} </h5>
                                        </td>
                                        <td class="bg-grey text-center">
                                            <h5 class="">
                                                £{{ $invoice->student->normalSubject()->sum('amount') }} Weekly</h5>
                                        </td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                    </tr>

                                    {{-- <tr class="bg-grey">
                                        <td class="text-center">
                                            <h5 class="font-weight-bolder">2</h5>
                                        </td>
                                        <td class="pl-2 ">
                                            <h5 class="font-weight-bolder"> 1 - 1 ( @foreach ($invoice->student->oneOnOneSubject() as $key => $value)
                                                    {{ $value->subject->name }}@if ($key + 1 != count($invoice->student->oneOnOneSubject()))
                                                        ,
                                                    @endif
                                                @endforeach ) -
                                                {{ $invoice->student->oneOnOneSubject()->sum('no_hr_weekly') }}
                                                hours/week</h5>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <h5 class="">
                                                £{{ $invoice->student->oneOnOneSubject()[0]->rate_per_hr }}</h5>
                                        </td>
                                        <td class="text-center bg-grey">
                                            <h5 class="">
                                                {{ $invoice->tax }}%</h5>
                                        </td>
                                        <td class="text-align-end bg-grey">
                                            <h5 class="font-weight-bolder">

                                                £{{ str_contains($invoice->type, 'Month') ? (str_contains($invoice->student->year->name, '11') ? number_format((($invoice->student->oneOnOneSubject()->sum('amount') * 40) / 9) * $months, 2) : number_format((($invoice->student->oneOnOneSubject()->sum('amount') * 52) / 12) * $months, 2)) : $invoice->student->oneOnOneSubject()->sum('amount') * $weeks }}
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                            <h5 class="">Period {{ $invoice->from_date }} -
                                                {{ $invoice->to_date }} </h5>
                                        </td>
                                        <td class="bg-grey text-center">
                                            <h5 class="">
                                                £{{ $invoice->student->oneOnOneSubject()->sum('amount') }} Weekly</h5>
                                        </td>
                                        <td class="bg-grey"></td>
                                    </tr> --}}
                                @else
                                    <tr class="bg-grey">
                                        <td class="text-center">
                                            <h5 class="font-weight-bolder">1</h5>
                                        </td>
                                        <td class="pl-2 ">
                                            <h5 class="font-weight-bolder"> 1 - 1( @foreach ($invoice->student->oneOnOneSubject() as $value)
                                                    {{ $value->subject->name }},
                                                @endforeach ) </h5>
                                        </td>
                                        <td class="text-align-end bg-grey">
                                            <h5 class="font-weight-bolder">£{{ $invoice->amount }}</h5>
                                        </td>
                                        <td class="text-align-end bg-grey">
                                            <h5 class="font-weight-bolder">{{ $invoice->tax }}%</h5>
                                        </td>
                                        <td class="text-align-end bg-grey">
                                            <h5 class="font-weight-bolder">£{{ $invoice->amount }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                            <h5 class="">Until {{ $invoice->to_date }} </h5>
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
                                @foreach ($invoice->receipt as $key => $value)
                                    @if ($value->late_fee > 0)
                                        <tr class="">
                                            <td class=" text-center">
                                                <h5 class="font-weight-bolder">
                                                    {{ $sr++ }}

                                                </h5>
                                            </td>
                                            <td class="pl-2">
                                                <h5 class="font-weight-bolder">Late Payment Charges</h5>
                                            </td>
                                            <td class="bg-grey">
                                                <h5 class="font-weight-bolder"></h5>
                                            </td>
                                            <td class="bg-grey">
                                                <h5 class="font-weight-bolder"></h5>
                                            </td>
                                            <td class="bg-grey text-align-end">
                                                <h5 class="font-weight-bolder">

                                                    £{{ $value->late_fee }}
                                                </h5>
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                    <td></td>
                                    <td class="pl-2">
                                        <h5 class="text-white">{{ $value->date }}</h5>
                                    </td>
                                    <td></td>
                                </tr> --}}
                                    @endif
                                    @if ($value->discount > 0)
                                        <tr class="bg-grey">
                                            <td class=" text-center">
                                                <h5 class="font-weight-bolder">
                                                    {{ $sr++ }}

                                                </h5>
                                            </td>
                                            <td class="pl-2">
                                                <h5 class="font-weight-bolder">Discount</h5>
                                            </td>
                                            <td class="bg-grey">
                                                <h5 class="font-weight-bolder"></h5>
                                            </td>
                                            <td class="bg-grey">
                                                <h5 class="font-weight-bolder"></h5>
                                            </td>
                                            <td class="bg-grey text-align-end">
                                                <h5 class="font-weight-bolder">

                                                    -£{{ $value->discount }}
                                                </h5>
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td></td>
                                            <td class="pl-2">
                                                <h5 class="text-white">{{ $value->date }}</h5>
                                            </td>
                                            <td></td>
                                        </tr> --}}
                                    @endif
                                    <tr class="bg-grey">
                                        <td class=" text-center">
                                            <h5 class="font-weight-bolder">

                                            </h5>
                                        </td>
                                        <td class="pl-2">
                                            <h5 class="font-weight-bolder"></h5>
                                        </td>
                                        <td class="bg-grey">
                                            <h5 class="font-weight-bolder"></h5>
                                        </td>
                                        <td class="bg-grey">
                                            <h5 class="font-weight-bolder">Total</h5>
                                        </td>
                                        <td class="bg-grey text-align-end">
                                            <h5 class="font-weight-bolder">

                                                £{{ $value->late_fee + $invoice->amount - $value->discount }}
                                            </h5>
                                        </td>
                                    </tr>

                                    <tr class="bg-grey">
                                        <td class=" text-center">
                                            <h5 class="font-weight-bolder">

                                                {{ $sr++ }}
                                            </h5>
                                        </td>
                                        <td class="pl-2">
                                            <h5 class="font-weight-bolder">{{ $value->description }}
                                                {{ $value->mode }}</h5>
                                        </td>
                                        <td class="bg-grey">
                                            <h5 class="font-weight-bolder"></h5>
                                        </td>
                                        <td class="bg-grey">
                                            <h5 class="font-weight-bolder"></h5>
                                        </td>
                                        <td class="bg-grey text-align-end">
                                            <h5 class="font-weight-bolder">

                                                -£{{ $value->amount }}
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pl-2">
                                            <h5 class="">{{ $value->date }}</h5>
                                        </td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                        <td class="bg-grey"></td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr>

                                <th class="text-align-end">

                                </th>
                                <th class="bg-grey text-align-end" colspan="3">
                                    <h5 class="font-weight-bolder">Sub Total(Inclusive Vat)</h5>
                                </th>
                                <th class="bg-grey text-align-end">
                                    <h5 class="font-weight-bolder">
                                        £{{ $invoice->totalAmount() }}
                                    </h5>
                                </th>
                            </tr>
                            <tr>

                                <th class="text-align-end">

                                </th>
                                <th class="bg-grey text-align-end" colspan="3">
                                    <h5 class="font-weight-bolder">Vat Inclusive</h5>
                                </th>
                                <th class="bg-grey text-align-end">
                                    <h5 class="font-weight-bolder">
                                        £{{ number_format($invoice->taxAmount(), 2) }}
                                    </h5>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row pt-3">
                    <div class="col-12">
                        <h5 class="font-weight-bolder">Term & Condition</h5>
                        <p class="justify-end">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
                            debitis
                            voluptatibus tempore enim
                            voluptates dicta a ullam iste consequuntur placeat ratione est modi commodi nihil aliquam
                            numquam,
                            veritatis ipsam obcaecati? Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
                            corporis
                            recusandae eos atque quisquam fugiat, velit consequatur beatae id perspiciatis laborum
                            aliquid rem
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
                            {{ $invoice->student->parents[0]->first_name }}
                            {{ $invoice->student->parents[0]->last_name }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="mb-0 text-center pt-5">Should you have any query converning this invoice/receipt,
                            please contact
                            us on
                            02085777077 or 07535050502 </p>
                        <p class="font-weight-bolder text-center pt-4">Thank you for your business!</p>
                        <p class="text-center font-weight-bolder">Company Registration Number:
                            {{ $invoice->student->branch->company_number }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary print-btn importStyle"
                    data-id="{{ $value->id }}">Print</button>
            </div>
        </div>
    </div>
</div>
