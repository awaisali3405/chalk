@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Staff</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Staff</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Staff</a></li>
                    </ol>
                </div>
            </div>

            <div class="row bg-white d-flex justify-content-center">
                <div class="col-4">
                    <div class="text-center p-3 " style="">
                        <div class="profile-photo">
                            {{-- @dd($invoice) --}}
                            <img id="img" src="{{ asset($student->profile_pic) }}" width="100" height="100"
                                class="img-fluid rounded-circle" alt="">
                        </div>
                        <label for="upload" class="mt-3 mb-1 text-bold"> Name : {{ $student->first_name }}
                            {{ $student->last_name }} </label>
                    </div>
                </div>
                <div class="col-4">
                    <div>

                        <label for="upload" class="mt-3 mb-1 text-bold"> Roll No: {{ $student->id }} </label>
                    </div>
                    <div>

                        <label for="upload" class="mt-3 mb-1 text-bold"> Year : {{ $student->year->name }} </label>
                    </div>
                    <div>

                        <label for="upload" class="mt-3 mb-1 text-bold"> Payment : {{ $student->payment_period }}
                        </label>
                    </div>
                    <div>

                        <label for="upload" class="mt-3 mb-1 text-bold"> Branch : {{ $student->branch->name }}</label>
                    </div>
                </div>

            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Invoice </h4>
                                {{-- <a href="{{ route('board.create') }}" class="btn btn-primary">+ Add new</a> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example5" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Sr</th>
                                                <th>Invoice Date</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Tax%</th>
                                                <th>Discount</th>
                                                <th>Late Fee</th>
                                                <th>Paid Amount</th>
                                                <th>Payable</th>
                                                <th>Status</th>
                                                <th>Period</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $total = 0;
                                            $total_paid = 0;
                                            $tatal_remaining = 0;
                                        @endphp
                                        <tbody>
                                            @foreach ($invoice as $key => $value)
                                                @php
                                                    $total += $value->amount;
                                                    // dd($value->);
                                                    $total_paid += $value->receipt->sum('amount');
                                                    $tatal_remaining += $value->amount - ($value->receipt->sum('discount') - $value->receipt->sum('late_fee')) - $value->receipt->sum('amount');
                                                @endphp
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->created_at->toDateString() }}</td>
                                                    <td>{{ $value->type }}</td>
                                                    <td>{{ $value->amount }}</td>
                                                    <td>{{ $value->tax }}</td>
                                                    <td>{{ $value->receipt->sum('discount') }}</td>
                                                    <td>{{ $value->receipt->sum('late_fee') }}</td>
                                                    <td>{{ $value->receipt->sum('amount') }}
                                                    </td>
                                                    <td>{{ $value->amount - ($value->receipt->sum('discount') - $value->receipt->sum('late_fee')) - $value->receipt->sum('amount') }}
                                                    </td>
                                                    <td>{{ $value->is_paid ? 'Paid' : 'Un Paid' }}</td>
                                                    <td>{{ $value->from_date }} - {{ $value->to_date }}</td>
                                                    <td>
                                                        {{-- <a href="{{ route('receipt.show', $value->id) }}"
                                                            class="btn btn-sm btn-primary">Recieve</a>
                                                        <a href="{{ route('invoice.print', $value->id) }}"
                                                            class="btn btn-sm btn-primary">Print</a>
                                                        <a href="{{ route('board.edit', $value->id) }}"
                                                            class="btn btn-sm btn-primary">Delete</a> --}}
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="true">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start"
                                                            style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                                                            @if (auth()->user()->role->name == 'parent')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('invoice.print', $value->id) }}">Print</a>
                                                            @else
                                                                <a class="dropdown-item"
                                                                    href="{{ route('receipt.show', $value->id) }}">Recieve</a>
                                                                <a class="dropdown-item btn-event"
                                                                    href="{{ route('invoice.print') }}" data-toggle="modal"
                                                                    data-target="#print-{{ $value->id }}">Print</a>
                                                                {{-- <a href="" class="btn btn-primary btn-event w-100">
                                                                    <span class="align-middle"><i
                                                                            class="ti-plus"></i></span> Create New
                                                                </a> --}}
                                                                <a class="dropdown-item"
                                                                    href="{{ route('board.edit', $value->id) }}">Delete</a>
                                                            @endif
                                                            {{-- <div class="modal fade none-border"
                                                                id="print-{{ $value->id }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"><strong>Add a
                                                                                    category</strong></h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label
                                                                                            class="control-label">Category
                                                                                            Name</label>
                                                                                        <input
                                                                                            class="form-control form-white"
                                                                                            placeholder="Enter name"
                                                                                            type="text"
                                                                                            name="category-name">
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label class="control-label">Choose
                                                                                            Category Color</label>
                                                                                        <div
                                                                                            class="dropdown bootstrap-select form-control form-white">
                                                                                            <select
                                                                                                class="form-control form-white"
                                                                                                data-placeholder="Choose a color..."
                                                                                                name="category-color"
                                                                                                tabindex="-98">
                                                                                                <option value="success">
                                                                                                    Success</option>
                                                                                                <option value="danger">
                                                                                                    Danger</option>
                                                                                                <option value="info">Info
                                                                                                </option>
                                                                                                <option value="pink">Pink
                                                                                                </option>
                                                                                                <option value="primary">
                                                                                                    Primary</option>
                                                                                                <option value="warning">
                                                                                                    Warning</option>
                                                                                            </select><button type="button"
                                                                                                class="btn dropdown-toggle btn-light"
                                                                                                data-toggle="dropdown"
                                                                                                role="button"
                                                                                                title="Success">
                                                                                                <div class="filter-option">
                                                                                                    <div
                                                                                                        class="filter-option-inner">
                                                                                                        <div
                                                                                                            class="filter-option-inner-inner">
                                                                                                            Success</div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </button>
                                                                                            <div class="dropdown-menu "
                                                                                                role="combobox">
                                                                                                <div class="inner show"
                                                                                                    role="listbox"
                                                                                                    aria-expanded="false"
                                                                                                    tabindex="-1">
                                                                                                    <ul
                                                                                                        class="dropdown-menu inner show">
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-default waves-effect"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                class="btn btn-danger waves-effect waves-light save-category"
                                                                                data-dismiss="modal">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        {{-- <a href="{{ route('branch.show', $value->id) }}"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>{{ $total }}</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>{{ $total_paid }}</th>
                                                <th>{{ $tatal_remaining }}</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
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

    </div>
    </div>
@endsection
