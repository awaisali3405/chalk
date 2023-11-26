@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Attendance</h4>
                    </div>
                </div>

            </div>
            <form action="{{ route('staff.update', $staff->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interview-text" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $staff->name }}"
                                id="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interview-time" class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation" value="{{ $staff->designation }}"
                                id="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interview-time" class="form-label">Contact</label>
                            <input type="text" class="form-control" name="contact_us" value="{{ $staff->contact_us }}"
                                id="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interview-time" class="form-label">Branch</label>
                            <select name="branch_id" id="" class="form-control">
                                <option value="">-</option>
                                @foreach ($branch as $value1)
                                    <option value="{{ $value1->id }}"
                                        {{ $staff->branch_id == $value1->id ? 'selected' : '' }}>
                                        {{ $value1->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interview-time" class="form-label">Department</label>
                            <select name="department_id" id="" class="form-control">
                                <option value="">-</option>
                                @foreach ($department as $value1)
                                    <option value="{{ $value1->id }}"
                                        {{ $staff->department_id == $value1->id ? 'selected' : '' }}>
                                        {{ $value1->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interview-time" class="form-label">Salary</label>
                            <input type="number" class="form-control" name="salary" value="{{ $staff->salary }}"
                                id="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interview-time" class="form-label">Salary Type</label>
                            <select name="salary_type" id="" class="form-control">
                                <option value="Monthly" {{ $staff->salary_type == 'Monthly' ? 'selected' : '' }}>Monthly
                                </option>
                                <option value="Hourly" {{ $staff->salary_type == 'Hourly' ? 'selected' : '' }}>Weekly
                                </option>

                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interview-time" class="form-label">Date of Join</label>
                            <input type="date" class="form-control" name="date_of_join"
                                value="{{ $staff->date_of_join }}" id="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interview-time" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $staff->email }}"
                                id="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interview-time" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" value="{{ $staff->password }}"
                                id="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            {{-- <button type="submit" class="btn btn-primary"></button> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
