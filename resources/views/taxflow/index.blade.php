@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Tax Flow</h4>
                    </div>
                </div>

            </div>

            <div class="profile-personal-info pt-4">
                <form action="{{ route('taxFlow.index') }}" method="get">
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
                            {{-- <button type="submit" class="btn btn-light">Cancel</button> --}}
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
                                                    <th class="">Amount</th>
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
                                                            $total += number_format(
                                                                auth()
                                                                    ->user()
                                                                    ->calculateTax($value1->invoice->tax, $value1->amount),
                                                                2,
                                                            );
                                                            $in += number_format(
                                                                auth()
                                                                    ->user()
                                                                    ->calculateTax($value1->invoice->tax, $value1->amount),
                                                                2,
                                                            );
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>
                                                            <td>{{ $value1->date }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>{{ $value1->invoice->student->year->name }}</td>
                                                            <td>Week
                                                                {{ auth()->user()->week($value1->invoice->student->admission_date) }}
                                                            </td>
                                                            <td>{{ $value1->invoice->student->first_name }}
                                                                {{ $value1->invoice->student->last_name }}
                                                                {{ $value1->description }} {{ $value1->mode }} (Tax
                                                                {{ $value1->invoice->tax }}%)</td>
                                                            <td>{{ $value1->amount }}</td>
                                                            <td></td>
                                                            <td>{{ number_format(auth()->user()->calculateTax($value1->invoice->tax, $value1->amount),2) }}
                                                            </td>
                                                            <td>{{ $total }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach ($value->expense() as $value1)
                                                        @php
                                                            $total -= $value1->tax;
                                                            $out += $value1->tax;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>

                                                            <td>{{ $value1->date }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>-</td>
                                                            <td>{{ auth()->user()->week($value1->date) }}
                                                            </td>
                                                            <td>{{ $value1->description }}</td>
                                                            <td>{{ $value1->amount }}
                                                            </td>
                                                            <td>{{ $value1->tax }}
                                                            </td>
                                                            <td></td>
                                                            <td>{{ $total }}</td>
                                                        </tr>
                                                    @endforeach
                                                    {{-- @foreach ($value->purchaseTax() as $value1)
                                                        @php
                                                            $total -= $value1->amount;
                                                            $out += $value1->amount;

                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>

                                                            <td>{{ $value1->date }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>-</td>
                                                            <td>{{ auth()->user()->week($value1->date) }}
                                                            </td>
                                                            <td>{{ $value1->description }}</td>
                                                            <td></td>
                                                            <td>{{ $value1->amount }}</td>
                                                            <td>{{ $total }}</td>
                                                        </tr>
                                                    @endforeach --}}
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
                                                    <td></td>

                                                    <th>{{ $out }}</th>
                                                    <th>{{ $in }}</th>
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
