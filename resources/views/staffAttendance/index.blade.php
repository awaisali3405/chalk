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

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                               
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Name</th>
                                                    <th>Department</th>
                                                    <th>
                                                        Branch
                                                    </th>
                                                    <th>
                                                        Department
                                                    </th>
                                                    <th>

                                                    </th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($board as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>

                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ $value->branch->name }}</td>
                                                        <td>{{ $value->department->name }}</td>
                                                        <td>
                                                            <a href="{{ route('staff.edit', $value->id) }}"
                                                                class="btn btn-sm btn-primary"><i
                                                                    class="la la-pencil"></i></a>
                                                            {{-- <a href="{{ route('branch.show', $value->id) }}"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a> --}}
                                                        </td>
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

        </div>
    </div>
@endsection
