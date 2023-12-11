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
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Mode</label>
                                        <div class="input-group mb-2">
                                            <select name="mode" id="" class="form-control ">
                                                <option value="">All</option>
                                                @foreach ($mode as $value)
                                                    <option value="{{ $value }}"
                                                        {{ $value == request()->input('mode') ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Type</label>
                                        <div class="input-group mb-2">
                                            <select name="type[]" id="sel2" multiple class="form-control ">
                                                <option value="">All</option>
                                                @foreach ($type as $value)
                                                    <option value="{{ $value }}"
                                                        {{ $value == request()->input('type') ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <div class="form-group">
                                                <label>Mutiple select list (hold shift to select more than one):</label>
                                                <select multiple="" class="form-control" id="sel2">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3  pt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <button type="submit" class=" btn btn-primary">Show</button>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                @if (request()->input())
                                                    <a href="{{ route('cashFlow.index') }}"
                                                        class="btn btn-secondary">Reset</a>
                                                @else
                                                    <button type="reset" class=" btn btn-secondary">Reset</button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <button type="reset" class=" btn btn-info">Print</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
                                                @foreach ($cashFlow as $key => $value)
                                                    @php
                                                        $total += $value->in - $value->out;
                                                        $out += $value->out;
                                                        $in += $value->in;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                                        <td>{{ $value->branch->name }}</td>
                                                        <td>Week {{ auth()->user()->week($value->date) }}</td>
                                                        <td>{{ $value->description }}</td>
                                                        <td>{{ $value->mode }}</td>
                                                        <td>{{ $value->type }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->in) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($value->out) }}</td>
                                                        <td>£{{ auth()->user()->priceFormat($total) }}</td>
                                                    </tr>
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
