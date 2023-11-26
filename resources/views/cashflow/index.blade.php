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
                <form action="{{ route('cashFlow.index') }}" class="" method="GET">
                    <div class="card d-none" id="filter-form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">Branch</label>
                                        <select name="branch_id" id="" class="form-control">
                                            <option value="">All</option>
                                            @foreach ($branch as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ $value->id == request()->input('branch_id') ? 'selected' : '' }}>
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">From Date</label>
                                        <input type="date" class="form-control" name="from_date"
                                            value="{{ request()->input('from_date') }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">To Date</label>
                                        <input type="date" class="form-control" name="to_date"
                                            value="{{ request()->input('to_date') }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">From Week</label>
                                        <select name="from_week" id="" class="form-control">
                                            <option value="">None</option>
                                            @for ($i = 1; $i < 53; $i++)
                                                <option value="{{ $i }}"
                                                    {{ $i == request()->input('from_week') ? 'selected' : '' }}>
                                                    Week {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">To Week</label>
                                        <select name="to_week" id="" class="form-control">
                                            <option value="">None</option>
                                            @for ($i = 1; $i < 53; $i++)
                                                <option value="{{ $i }}"
                                                    {{ $i == request()->input('to_week') ? 'selected' : '' }}>
                                                    Week {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center pt-2">
                                    <div class="form-group">
                                        <button type="submit" class=" btn btn-primary">Show</button>
                                    </div>
                                </div>


                            </div>
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
                                <div class="card-header">
                                    <h4 class="card-title">All Student </h4>
                                    <div class="">

                                        <span id="filter" class="btn btn-secondary">Filter</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display">
                                            <thead>
                                                <tr class="bg-gray">
                                                    <th class="">Sr</th>
                                                    <th class="">Date</th>
                                                    <th class="">Branch</th>
                                                    <th class="">Week</th>

                                                    <th class="">Description</th>
                                                    <th class="">Mode</th>
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
                                                @foreach ($branch_id as $value)
                                                    @php
                                                        $query = $value->receipt();
                                                        if (request()->get('from_date')) {
                                                            $query = $query->where('date', '>=', request()->get('from_date'));
                                                        } elseif (request()->get('from_week')) {
                                                            $query = $query->where(
                                                                'date',
                                                                '>=',
                                                                auth()
                                                                    ->user()
                                                                    ->dateWeek(request()->get('from_week')),
                                                            );
                                                        }
                                                        if (request()->get('to_date')) {
                                                            $query = $query->where('date', '<=', request()->get('to_date'));
                                                        } elseif (request()->get('to_week')) {
                                                            $query = $query->where(
                                                                'date',
                                                                '<=',
                                                                auth()
                                                                    ->user()
                                                                    ->dateWeek(request()->get('to_week')),
                                                            );
                                                        }
                                                        $query = $query->get();
                                                    @endphp
                                                    @foreach ($query as $value1)
                                                        @php
                                                            $total += $value1->amount;
                                                            $in += $value1->amount;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>
                                                            <td>{{ auth()->user()->ukFormat($value1->date) }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>Week
                                                                {{ auth()->user()->week($value1->date) }}
                                                            </td>
                                                            <td>{{ $value1->invoice->student->first_name }}
                                                                {{ $value1->invoice->student->last_name }}
                                                                ({{ $value1->academicYear->period() }})
                                                            </td>
                                                            <td>{{ $value1->mode }}</td>
                                                            <td>{{ $value1->invoice->type }}</td>
                                                            <td>£{{ auth()->user()->priceFormat($value1->amount) }}
                                                            </td>
                                                            <td>£0</td>
                                                            <td>£{{ auth()->user()->priceFormat($total) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @php
                                                        $query = $value->expense();
                                                        if (request()->get('from_date')) {
                                                            $query = $query->where('date', '>=', request()->get('from_date'));
                                                        } elseif (request()->get('from_week')) {
                                                            $query = $query->where(
                                                                'date',
                                                                '>=',
                                                                auth()
                                                                    ->user()
                                                                    ->dateWeek(request()->get('from_week')),
                                                            );
                                                        }
                                                        if (request()->get('to_date')) {
                                                            $query = $query->where('date', '<=', request()->get('to_date'));
                                                        } elseif (request()->get('to_week')) {
                                                            $query = $query->where(
                                                                'date',
                                                                '<=',
                                                                auth()
                                                                    ->user()
                                                                    ->dateWeek(request()->get('to_week')),
                                                            );
                                                        }
                                                        $query = $query->get();
                                                    @endphp
                                                    @foreach ($query as $value1)
                                                        @php
                                                            $total -= $value1->amount;
                                                            $out += $value1->amount;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>

                                                            <td>{{ auth()->user()->ukFormat($value1->date) }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>
                                                                Week {{ auth()->user()->week($value1->date) }}
                                                            </td>
                                                            <td>({{ $value1->description }})
                                                                {{ $value1->accountType->name }}
                                                            </td>
                                                            <td>{{ $value1->payment_type }}</td>
                                                            <td>Expense</td>
                                                            <td>£0</td>
                                                            <td>£{{ auth()->user()->priceFormat($value1->amount) }}
                                                            </td>
                                                            <td>£{{ auth()->user()->priceFormat($total) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    {{-- Purchase --}}
                                                    @php
                                                        $query = $value->purchase();
                                                        if (request()->get('from_date')) {
                                                            $query = $query->where('date', '>=', request()->get('from_date'));
                                                        } elseif (request()->get('from_week')) {
                                                            $query = $query->where(
                                                                'date',
                                                                '>=',
                                                                auth()
                                                                    ->user()
                                                                    ->dateWeek(request()->get('from_week')),
                                                            );
                                                        }
                                                        if (request()->get('to_date')) {
                                                            $query = $query->where('date', '<=', request()->get('to_date'));
                                                        } elseif (request()->get('to_week')) {
                                                            $query = $query->where(
                                                                'date',
                                                                '<=',
                                                                auth()
                                                                    ->user()
                                                                    ->dateWeek(request()->get('to_week')),
                                                            );
                                                        }
                                                        $query = $query->get();
                                                    @endphp
                                                    @foreach ($query as $value1)
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
                                                            <td>Qty({{ $value1->quantity }}) Paid by
                                                                {{ $value1->mode }}
                                                            </td>
                                                            <td>Purchase</td>
                                                            <td>£0</td>
                                                            <td>£{{ auth()->user()->priceFormat($value1->amount) }}
                                                            </td>
                                                            <td>£{{ auth()->user()->priceFormat($total) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    {{-- Sale --}}
                                                    @php
                                                        $query = $value->sale();
                                                        if (request()->get('from_date')) {
                                                            $query = $query->where('date', '>=', request()->get('from_date'));
                                                        } elseif (request()->get('from_week')) {
                                                            $query = $query->where(
                                                                'date',
                                                                '>=',
                                                                auth()
                                                                    ->user()
                                                                    ->dateWeek(request()->get('from_week')),
                                                            );
                                                        }
                                                        if (request()->get('to_date')) {
                                                            $query = $query->where('date', '<=', request()->get('to_date'));
                                                        } elseif (request()->get('to_week')) {
                                                            $query = $query->where(
                                                                'date',
                                                                '<=',
                                                                auth()
                                                                    ->user()
                                                                    ->dateWeek(request()->get('to_week')),
                                                            );
                                                        }
                                                        $query = $query->get();
                                                    @endphp
                                                    @foreach ($query as $value1)
                                                        @php
                                                            $total += $value1->amount;
                                                            $in += $value1->productSum();

                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>

                                                            <td>{{ auth()->user()->ukFormat($value1->date) }}</td>
                                                            <td>{{ $value->name }}</td>

                                                            <td>
                                                                Week {{ auth()->user()->week($value1->date) }}
                                                            </td>
                                                            <td>Qty{{ $value1->product()->sum('quantity') }} </td>
                                                            <td>{{ $value1->payment_type }}</td>
                                                            <td>Sale</td>
                                                            <td>£{{ auth()->user()->priceFormat($value1->productSum()) }}
                                                            </td>
                                                            <td>£0</td>
                                                            <td>£{{ auth()->user()->priceFormat($total) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    {{-- Total Income --}}
                                                    @foreach ($value->staff as $value1)
                                                        @php
                                                            $query = $value1->receipt();
                                                            if (request()->get('from_date')) {
                                                                $query = $query->where('date', '>=', request()->get('from_date'));
                                                            } elseif (request()->get('from_week')) {
                                                                $query = $query->where(
                                                                    'date',
                                                                    '>=',
                                                                    auth()
                                                                        ->user()
                                                                        ->dateWeek(request()->get('from_week')),
                                                                );
                                                            }
                                                            if (request()->get('to_date')) {
                                                                $query = $query->where('date', '<=', request()->get('to_date'));
                                                            } elseif (request()->get('to_week')) {
                                                                $query = $query->where(
                                                                    'date',
                                                                    '<=',
                                                                    auth()
                                                                        ->user()
                                                                        ->dateWeek(request()->get('to_week')),
                                                                );
                                                            }
                                                            $query = $query->get();
                                                        @endphp
                                                        @foreach ($query as $value2)
                                                            @php
                                                                $total -= $value2->amount;
                                                                $out += $value2->amount;

                                                            @endphp
                                                            <tr>
                                                                <td>{{ $sr++ }}</td>

                                                                <td>{{ auth()->user()->ukFormat($value1->created_at) }}
                                                                </td>
                                                                <td>{{ $value->name }}</td>
                                                                <td>
                                                                    Week {{ auth()->user()->week($value1->date) }}
                                                                </td>
                                                                <td>Qty({{ $value1->product()->sum('quantity') }})
                                                                </td>
                                                                <td>Sale</td>
                                                                <td>£{{ auth()->user()->priceFormat($value1->productSum()) }}
                                                                </td>
                                                                <td>£0</td>
                                                                <td>£{{ auth()->user()->priceFormat($total) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    {{-- @dd($value->loan()) --}}
                                                    @php
                                                        $query = $value->loan();
                                                        if (request()->get('from_date')) {
                                                            $query = $query->where('created_at', '>=', request()->get('from_date'));
                                                        } elseif (request()->get('from_week')) {
                                                            $query = $query->where(
                                                                'created_at',
                                                                '>=',
                                                                auth()
                                                                    ->user()
                                                                    ->dateWeek(request()->get('from_week')),
                                                            );
                                                        }
                                                        if (request()->get('to_date')) {
                                                            $query = $query->where('created_at', '<=', request()->get('to_date'));
                                                        } elseif (request()->get('to_week')) {
                                                            $query = $query->where(
                                                                'created_at',
                                                                '<=',
                                                                auth()
                                                                    ->user()
                                                                    ->dateWeek(request()->get('to_week')),
                                                            );
                                                        }
                                                        $query = $query->get();
                                                    @endphp
                                                    @foreach ($query as $value1)
                                                        @php
                                                            $total -= $value1->amount;
                                                            $out += $value1->amount;

                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr++ }}</td>

                                                            <td>{{ auth()->user()->ukFormat($value1->created_at) }}
                                                            </td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>-</td>
                                                            <td>
                                                                Week {{ auth()->user()->week($value1->created_at) }}
                                                            </td>
                                                            <td>Loan given to {{ $value1->staff->name }}</td>
                                                            <td>Loan</td>
                                                            <td>£0</td>
                                                            <td>£{{ auth()->user()->priceFormat($value1->amount) }}
                                                            </td>
                                                            <td>£{{ auth()->user()->priceFormat($total) }}</td>
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
                                                                    <td>Loan received by {{ $value1->staff->name }}
                                                                    </td>
                                                                    <td>Loan</td>
                                                                    <td>£{{ auth()->user()->priceFormat($value2->loan) }}
                                                                    </td>
                                                                    <td>£0</td>
                                                                    <td>£{{ auth()->user()->priceFormat($total) }}</td>
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
                                                    <th>£{{ auth()->user()->priceFormat($in) }}</th>
                                                    <th>£{{ auth()->user()->priceFormat($out) }}</th>
                                                    <th>£{{ auth()->user()->priceFormat($total) }}</th>

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
