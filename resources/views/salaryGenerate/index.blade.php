@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Generate Salary</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-xl-12 col-xxl-12 col-lg-12" id="widget">
                    <div class="card">
                        <div class="card-body">

                            {{-- All  --}}
                            <div id="receipt-list" class="tab-pane fade  show">
                                <div class="profile-personal-info pt-4">
                                    <form action="{{ route('generateSalary.index') }}" method="get">

                                        <div class="row">
                                            <div class="col-lg-4 col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Branch</label>
                                                    <div class="input-group mb-2">
                                                        <select name="branch_id" id="branch_id" class="form-control">
                                                            <option value="0">All</option>
                                                            @foreach ($branch as $value)
                                                                <option value="{{ $value->id }}"
                                                                    {{ request()->branch_id == $value->id ? 'selected' : '' }}>
                                                                    {{ $value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Department</label>
                                                    <div class="input-group mb-2">
                                                        <select name="department_id" class="form-control">
                                                            <option value="0">All</option>
                                                            @foreach ($department as $value)
                                                                <option value="{{ $value->id }}"
                                                                    {{ request()->department_id == $value->id ? 'selected' : '' }}>
                                                                    {{ $value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>




                                            <div
                                                class="col-lg-12 col-md-6 col-sm-12 pt-4 justify-content-center d-flex pb-4">
                                                <button type="submit" class="btn btn-primary">Show</button>

                                                {{-- <button type="submit" class="btn btn-light">Cancel</button> --}}
                                            </div>

                                        </div>
                                    </form>


                                </div>
                                <form action="{{ route('generateSalary.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="row tab-content">
                                                <div id="list-view" class="tab-pane fade active show col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Staff </h4>
                                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">From Date</label>
                                                                    <div class="input-group mb-2">
                                                                        <input type="text"
                                                                            class="form-control start_date" name="from_date"
                                                                            placeholder=""
                                                                            value="{{ request()->from_date }}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">To Date</label>
                                                                    <div class="input-group mb-2">

                                                                        <input type="text" class="form-control end_date"
                                                                            name="to_date" placeholder=""
                                                                            value="{{ request()->to_date }}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Generate
                                                                Invoice</button>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="example5" class="display"
                                                                    style="min-width: 845px">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><input type="checkbox" name=""
                                                                                    id="check_all">
                                                                            </th>
                                                                            <th>Name</th>
                                                                            <th>Department</th>
                                                                            <th>Branch</th>
                                                                            <th>Salary</th>
                                                                            <th>Salary Type</th>
                                                                            {{-- <th>Action</th> --}}
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($staff as $key => $value)
                                                                            <tr>
                                                                                <td><input type="checkbox" name="staff[]"
                                                                                        value="{{ $value->id }}"
                                                                                        id="" class="checkbox">
                                                                                </td>
                                                                                </td>
                                                                                <td>{{ $value->name }}
                                                                                </td>
                                                                                <td>{{ $value->department->name }}
                                                                                </td>
                                                                                <td>{{ $value->branch->name }}
                                                                                </td>
                                                                                <td>£{{ $value->salary }}
                                                                                </td>
                                                                                <td>{{ $value->salary_type }}
                                                                                </td>

                                                                                {{-- <td>
                                                                                            <a href="{{ route('student.show', $value->id) }}"
                                                                                                title="upload"
                                                                                                class="btn btn-sm btn-info"><i
                                                                                                    class="la la-eye"></i></a>
                                                                                            <a href="{{ route('invoice.show', $value->id) }}"
                                                                                                title="upload"
                                                                                                class="btn btn-sm btn-info">Invoice</a>
                                                                                        </td> --}}
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
