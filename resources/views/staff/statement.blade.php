@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Staff Statement</h4>
                    </div>
                </div>

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
                                                    <th class="">Staff Name</th>
                                                    <th class="">Description</th>
                                                    <th class="">Mode</th>
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
                                                @foreach ($staff->receipt()->latest()->get() as $value)
                                                    @php
                                                        $sr++;
                                                        $total -= $value->total();

                                                        $out += $value->total();
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $sr }}</td>
                                                        <td>{{ auth()->user()->ukFormat($value->created_at) }}</td>
                                                        <td>{{ $value->staff->name }}</td>
                                                        <td>Staff </td>
                                                        <td>{{ $value->mode }}</td>
                                                        <td>0</td>
                                                        <td>{{ $value->total() }}</td>
                                                        <td>{{ $total }}</td>
                                                    </tr>
                                                    @if ($value->loan)
                                                        @php
                                                            $sr++;
                                                            $total += $value->loan;
                                                            $in += $value->loan;

                                                        @endphp
                                                        <tr>
                                                            <td>{{ $sr }}</td>
                                                            <td>{{ auth()->user()->ukFormat($value->created_at) }}</td>
                                                            <td>{{ $value->staff->name }}</td>
                                                            <td>Loan</td>
                                                            <td>{{ $value->mode }}</td>
                                                            <td>{{ $value->loan }}</td>
                                                            <td>0</td>
                                                            <td>{{ $total }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            <thead>

                                                <tr>
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
