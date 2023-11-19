@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Cash Flow</h4>
                    </div>
                </div>

            </div>

            <div class="profile-personal-info pt-4">
                <form action="{{ route('cashFlow.index') }}" method="get">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Branch</label>
                                <div class="input-group mb-2">
                                    <select name="branch_id" id="branch_id" class="form-control">
                                        <option value="-1">All</option>
                                        @foreach ($branch as $value)
                                            <option value="{{ $value->id }}"
                                                {{ request()->get('branch_id') == $value->id ? 'selected' : '' }}>
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Academic Year</label>
                                <div class="input-group mb-2">
                                    <select name="academic_year_id" id="academic_year_id" class="form-control">
                                        <option value="">-</option>
                                        @foreach ($academicCalender as $value)
                                            <option value="{{ $value->id }}"
                                                {{ request()->get('academic_year_id') == $value->id ? 'selected' : '' }}>
                                                {{ $value->start_date }} - {{ $value->end_date }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 pt-4">
                            <button type="submit" class="btn btn-primary">Show</button>
                            {{-- <button type="submit" class="btn btn-light">Cencel</button> --}}
                        </div>
                    </div>
                </form>

            </div>
            {{-- <form action="{{ route('attendance.store') }}" method="post">
                @csrf
                <input type="hidden" name="date" value="{{ request()->get('date') }}" required> --}}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr class="bg-gray">
                                                    <th class="">Sr</th>
                                                    <th class="">Date</th>
                                                    <th class="">Branch</th>
                                                    <th class="">Year </th>
                                                    <th class="">Week</th>
                                                    <th class="">Description</th>
                                                    <th class="">Type</th>
                                                    <th class="">IN</th>
                                                    <th class="">OUT</th>
                                                    <th class="">Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total = 0;
                                                    $sr = 1;
                                                    $in = 0;
                                                    $out = 0;
                                                @endphp
                                                @foreach ($branch as $value)
                                                    @foreach ($value->receipt() as $value1)
                                                        @php
                                                            $total += $value1->amount;
                                                            $in += $value1->amount;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>
                                                            <td>{{ auth()->user()->ukFormat($value1->date) }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>{{ $value1->invoice->student->year->name }}</td>
                                                            <td>W
                                                                eek
                                                                {{ auth()->user()->week($value1->invoice->student->admission_date) }}
                                                            </td>
                                                            <td>{{ $value1->invoice->student->first_name }}
                                                                {{ $value1->invoice->student->last_name }}
                                                                {{ $value1->description }} {{ $value1->mode }}</td>
                                                            <td>Fee</td>
                                                            <td>{{ $value1->amount }}</td>
                                                            <td>0</td>
                                                            <td>{{ $total }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach ($value->expense() as $value1)
                                                        @php
                                                            $total -= $value1->amount;
                                                            $out += $value1->amount;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>

                                                            <td>{{ auth()->user()->ukFormat($value1->date) }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>-</td>
                                                            <td>
                                                                Week {{ auth()->user()->week($value1->date) }}
                                                            </td>
                                                            <td>{{ $value1->description }}</td>
                                                            <td>Expense</td>
                                                            <td>0</td>
                                                            <td>{{ $value1->amount }}</td>
                                                            <td>{{ $total }}</td>
                                                        </tr>
                                                    @endforeach
                                                    {{-- Purchase --}}
                                                    @foreach ($value->purchase() as $value1)
                                                        @php
                                                            $total -= $value1->amount;
                                                            $out += $value1->amount;

                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>

                                                            <td>{{ auth()->user()->ukFormat($value1->date) }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>-</td>
                                                            <td>
                                                                Week {{ auth()->user()->week($value1->date) }}
                                                            </td>
                                                            <td>Qty({{ $value1->quantity }}) Paid by {{ $value1->mode }}
                                                            </td>
                                                            <td>Purchase</td>
                                                            <td>0</td>
                                                            <td>{{ $value1->amount }}</td>
                                                            <td>{{ $total }}</td>
                                                        </tr>
                                                    @endforeach
                                                    {{-- Sale --}}
                                                    @foreach ($value->sale() as $value1)
                                                        @php
                                                            $total += $value1->amount;
                                                            $in += $value1->productSum();

                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>

                                                            <td>{{ auth()->user() - ukFormat($value1->date) }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>-</td>
                                                            <td>
                                                                Week {{ auth()->user()->week($value1->date) }}
                                                            </td>
                                                            <td>Qty{{ $value->quantity() }} </td>
                                                            <td>Sale</td>
                                                            <td>0</td>
                                                            <td>{{ $value1->productSum() }}</td>
                                                            <td>{{ $total }}</td>
                                                        </tr>
                                                    @endforeach
                                                    {{-- @dd($value->loan()) --}}
                                                    @foreach ($value->loan()->get() as $value1)
                                                        @php
                                                            $total -= $value1->amount;
                                                            $out += $value1->amount;

                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>

                                                            <td>{{ auth()->user()->ukFormat($value1->created_at) }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>-</td>
                                                            <td>
                                                                Week {{ auth()->user()->week($value1->created_at) }}
                                                            </td>
                                                            <td>Loan given to {{ $value1->staff->name }}</td>
                                                            <td>Loan</td>
                                                            <td>0</td>
                                                            <td>{{ $value1->amount }}</td>
                                                            <td>{{ $total }}</td>
                                                        </tr>
                                                        @php
                                                            // dd();
                                                            $other = $value1->staff
                                                                ->loan()
                                                                ->where('id', '!=', $value->id)
                                                                ->get();
                                                            $query = $value1->staff->receipt();
                                                            if (count($other) > 0) {
                                                                $query = $query->where('created_at', '<=', $other[0]->created_at)->where('created_at', '>', $value1->created_at);
                                                            } else {
                                                                $query = $query->where('created_at', '>', $value1->created_at);
                                                            }
                                                            $query = $query->get();
                                                        @endphp
                                                        @if (count($value1->staff->receipt) > 0)
                                                            @foreach ($query as $value2)
                                                                @php
                                                                    $sr++;
                                                                    $total += $value2->loan;
                                                                    $in += $value2->loan;
                                                                @endphp
                                                                <tr>
                                                                    <td>{{ $sr++ }}</td>

                                                                    <td>{{ auth()->user()->ukFormat($value2->created_at) }}
                                                                    </td>
                                                                    <td>{{ $value->name }}</td>
                                                                    <td>-</td>
                                                                    <td>Week

                                                                        {{ auth()->user()->week($value2->created_at) }}
                                                                    </td>
                                                                    <td>Loan received by {{ $value1->staff->name }}</td>
                                                                    <td>Loan</td>
                                                                    <td>{{ $value2->loan }}</td>
                                                                    <td>0</td>
                                                                    <td>{{ $total }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                            <thead>

                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{ $in }}</th>
                                                    <th>{{ $out }}</th>
                                                    <th>{{ $total }}</th>

                                                </tr>
                                            </thead>
                                        </table>




                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- </form> --}}


        </div>
    </div>
    {{-- <script>
        var table = $('#example5').dataTable();
        var data = table.column(0).data().sort();
    </script> --}}
@endsection
