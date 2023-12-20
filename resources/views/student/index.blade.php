@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Student </h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            @if (auth()->user()->role->name != 'parent')
                                <form action="{{ route('student.index') }}" class="" method="GET">
                                    {{-- @csrf --}}
                                    <div class="card  {{ request()->input() ? '' : 'd-none' }}" id="filter-form">
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
                                                        <input type="date"
                                                            max="{{ auth()->user()->session()->end_date }}"
                                                            min="{{ auth()->user()->session()->start_date }}"
                                                            class="form-control" name="from_date"
                                                            value="{{ request()->input('from_date') }}">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label">To Date</label>
                                                        <input type="date"
                                                            max="{{ auth()->user()->session()->end_date }}"
                                                            min="{{ auth()->user()->session()->start_date }}"
                                                            class="form-control" name="to_date"
                                                            value="{{ request()->input('to_date') }}">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Current School</label>
                                                        <select name="current_school" id="" class="form-control">

                                                            <option value="">All</option>
                                                            @foreach ($currentShool as $value)
                                                                <option value="{{ $value }}"
                                                                    {{ $value == request()->input('current_school') ? 'selected' : '' }}>
                                                                    {{ $value }}</option>
                                                            @endforeach

                                                        </select>
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
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Know About Us</label>
                                                        <select name="reference" id="" class="form-control">

                                                            <option value="">None</option>
                                                            @foreach ($knowUsAbout as $value)
                                                                <option value="{{ $value }}"
                                                                    {{ $value == request()->input('reference') ? 'selected' : '' }}>
                                                                    {{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Payment Period</label>
                                                        <select name="payment_period" id="" class="form-control">

                                                            <option value="">None</option>
                                                            <option value="Weekly"
                                                                {{ request()->input('payment_period') == 'Weekly' ? 'selected' : '' }}>
                                                                Weekly</option>
                                                            <option value="Monthly"
                                                                {{ request()->input('payment_period') == 'Monthly' ? 'selected' : '' }}>
                                                                Monthly</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-3  pt-4">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class=" btn btn-primary">Show</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                @if (request()->input())
                                                                    <a href="{{ route('student.index') }}"
                                                                        class="btn btn-secondary">Reset</a>
                                                                @else
                                                                    <button type="reset"
                                                                        class=" btn btn-secondary">Reset</button>
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
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Student </h4>
                                    <div class="">
                                        <span id="filter" class="btn btn-secondary">Filter</span>
                                        <a href="{{ route('student.create') }}" class="btn btn-primary">+ Add new</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display pb-5">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Roll</th>
                                                    <th>Name</th>
                                                    <th>Year</th>
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($student as $key => $value)
                                                    @if (
                                                        $value->promotionDetail()->where(
                                                                'academic_year_id',
                                                                auth()->user()->session()->id)->first() ||
                                                            auth()->user()->role->name == 'parent' ||
                                                            str_contains(url()->current(), 'request'))
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $value->currentRollNo() }}</td>
                                                            <td>{{ $value->first_name }} {{ $value->last_name }} </td>
                                                            <td>
                                                                {{ $value->currentYear()->name }}
                                                            </td>
                                                            <td>{{ auth()->user()->ukFormat($value->admission_date) }}</td>
                                                            <td>Week
                                                                {{ auth()->user()->week($value->admission_date) == 0? auth()->user()->week($value->promotion_date): auth()->user()->week($value->admission_date) }}

                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-primary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="true">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu" x-placement="bottom-start"
                                                                    style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                                                                    @if (auth()->user()->role->name != 'parent')
                                                                        @if ($value->active)
                                                                        @endif
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('student.edit', $value->id) }}">
                                                                            {{ str_contains(url()->current(), 'request') ? 'Register' : 'Edit' }}
                                                                        </a>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('student.note', $value->id) }}">Note</a>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('student.upload', $value->id) }}">Upload</a>
                                                                        @if ($value->active)
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('student.show', $value->id) }}">Show</a>
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('invoice.show', $value->id) }}">Invoices</a>
                                                                            <a class="dropdown-item" data-toggle="modal"
                                                                                data-target="#statement-{{ $value->id }}">Statement
                                                                            </a>
                                                                            <a class="dropdown-item  {{ $value->promotionDetail->where('academic_year_id','>',auth()->user()->session()->id)->count() > 0? 'd-none': '' }}"
                                                                                data-toggle="modal"
                                                                                data-target="#promotion-{{ $value->id }}">Promotion</a>
                                                                            <a class="dropdown-item " data-toggle="modal"
                                                                                data-target="#transfer-{{ $value->id }}">Transfer
                                                                            </a>
                                                                        @endif
                                                                    @else
                                                                        @if (!$value->active)
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('student.edit', $value->id) }}">Edit</a>
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                onclick="event.preventDefault(); document.getElementById('delete').submit();">
                                                                                Delete
                                                                            </a>
                                                                            <form method="POST" id="delete"
                                                                                action="{{ route('student.destroy', $value->id) }}">
                                                                                @csrf
                                                                                <input name="_method" type="hidden"
                                                                                    value="DELETE">

                                                                            </form>
                                                                        @else
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('student.show', $value->id) }}">Show</a>
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('invoice.show', $value->id) }}">Invoices</a>

                                                                            <a class="dropdown-item" data-toggle="modal"
                                                                                data-target="#statement-{{ $value->id }}">Statement</a>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <tr>
                                                        <td colspan="6">No data</td>
                                                    </tr>
                                                @endforelse
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
    @foreach ($student as $value)
        @include('student.promotion')
        @include('student.transfer')
        @if ($value->branch)
            @include('student.statement')
        @endif
    @endforeach
@endsection
