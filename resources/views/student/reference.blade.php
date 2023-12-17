@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Referred Student </h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Referred Student </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display pb-5">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Reference Student Name</th>
                                                    <th>Referred Student Name</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($reference as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value->referred->name() }}</td>
                                                        <td>{{ $value->reference->name() }}</td>
                                                    </tr>
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
@endsection
