<div class="modal fade print printme" id="registration-{{ $value->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registration</b>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
            </div>
            <form action="{{ route('staff.register', $value->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-text" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $value->first_name }} {{ $value->last_name }}" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-time" class="form-label">Designation</label>
                                <input type="text" class="form-control" name="designation"
                                    value="{{ $value->designation }}" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-time" class="form-label">Contact</label>
                                <input type="text" class="form-control" name="contact_us" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-time" class="form-label">Branch</label>
                                <select name="branch_id" id="" class="form-control">
                                    <option value="">-</option>
                                    @foreach ($branch as $value1)
                                        <option value="{{ $value1->id }}"
                                            {{ $value->branch_id == $value1->id ? 'selected' : '' }}>
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
                                            {{ $value->department_id == $value1->id ? 'selected' : '' }}>
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
                                <input type="number" class="form-control" name="salary" value="10" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-time" class="form-label">Salary Type</label>
                                <select name="salary_type" id="" class="form-control">
                                    <option value="Monthly">Monthly</option>
                                    <option value="Hourly">Hourly</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-time" class="form-label">Date of Join</label>
                                <input type="date" class="form-control" name="date_of_join" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-time" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-time" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pt-4">

                                <button type="submit" class="btn btn-primary">Register</button>
                                {{-- <button type="submit" class="btn btn-primary"></button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
