@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Parent</h4>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Parent</h4>
                                    <a href="{{ route('parent.create') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Relation
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        Contact No.
                                                    </th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($parent as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>

                                                        <td>{{ $value->name() }}</td>
                                                        <td>{{ $value->relationship }}</td>
                                                        <td>{{ $value->email }}</td>
                                                        <td>{{ $value->mobile_number }}</td>
                                                        <td>

                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="true">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" x-placement="bottom-start"
                                                                style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px); height:150px; overflow:auto;">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('parent.edit', $value->id) }}">Edit</a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('parent.show', $value->id) }}">Show</a>

                                                                @if (count($value->student) == 0 && !$value->user)
                                                                    <form action="{{ route('parent.destroy', $value->id) }}"
                                                                        id="delete-{{ $value->id }}" method="POST">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <a onclick="document.getElementById('delete-{{ $value->id }}').submit()"
                                                                            class="dropdown-item">Delete</a>
                                                                    </form>
                                                                @endif
                                                            </div>
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
