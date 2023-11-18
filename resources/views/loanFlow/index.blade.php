@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Loan Flow</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Loan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Staff Name</th>
                                                    <th>IN</th>
                                                    <th>OUT</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $sr = 0;
                                                    $total = 0;
                                                    $in = 0;
                                                    $out = 0;
                                                @endphp
                                                @foreach ($loan as $key => $value)
                                                    @php
                                                        $sr++;
                                                        $total -= $value->amount;
                                                        $out += $value->amount;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $sr }}</td>
                                                        <td>{{ $value->staff->name }}</td>
                                                        <td>0</td>
                                                        <td>{{ $value->amount }}</td>
                                                        <td>{{ $total }}</td>

                                                    </tr>
                                                    {{-- @dd($value->staff->receipt) --}}
                                                    @php
                                                        $other = $value->staff
                                                            ->loan()
                                                            ->where('staff_id', $value->staff_id)
                                                            ->where('id', '!=', $value->id)
                                                            ->get();
                                                        $query = $value->staff->receipt();
                                                        if (count($other) > 0) {
                                                            $query = $query->where('created_at', '<=', $other[0]->created_at)->where('created_at', '>', $value->created_at);
                                                        } else {
                                                            $query = $query->where('created_at', '>', $value->created_at);
                                                        }
                                                        $query = $query->get();
                                                    @endphp
                                                    @if (count($value->staff->receipt) > 0)
                                                        @foreach ($query as $value2)
                                                            @php
                                                                $sr++;
                                                                $total += $value2->loan;
                                                                $in += $value2->loan;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $sr }}</td>
                                                                <td>{{ $value->staff->name }}</td>
                                                                <td>{{ $value2->loan }}</td>
                                                                <td>0</td>
                                                                <td>{{ $total }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th>{{ $in }}</th>
                                                        <th>{{ $out }}</th>
                                                        <th>{{ $total }}</th>
                                                    </tr>
                                                </thead>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
