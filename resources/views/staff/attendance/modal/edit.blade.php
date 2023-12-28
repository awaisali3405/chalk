<div class="modal fade print printme" id="attendance-{{ $value->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Attendace</b>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
            </div> @php
                $time = \Carbon\Carbon::parse($value->start_time)->diff(\Carbon\Carbon::parse($value->end_time));
            @endphp

            <div class="modal-body">
                <form action="{{ route('staff.attendance.update', $value->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Date</label>
                                <input type="date" max="{{ auth()->user()->session()->end_date }}"
                                    min="{{ auth()->user()->session()->start_date }}" class="form-control"
                                    name="date" value="{{ $value->date }}" id="">


                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Staff Time</label>
                                <input type="time" class="form-control start_time1" name="start_time"
                                    id="start_time1" value="{{ $value->start_time }}" id="">


                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">End Time</label>
                                <input type="time" class="form-control end_time1" name="end_time" id="end_time1"
                                    value="{{ $value->end_time }}" id="">


                            </div>
                        </div>
                        {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Calculated Time</label>
                                <input type="text" class="form-control calculated_time1" name=""
                                    id="calculated_time1" value="{{ $time->h . '.' . $time->i }}" readonly
                                    id="">


                            </div>
                        </div> --}}
                        @if ($staff->salary_type == 'Hourly')
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Hour</label>
                                    <input type="number" class="form-control" name="paid_hour"
                                        value="{{ $value->paid_hour }}" id="">


                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Rate Per Hour</label>
                                    <input type="number" class="form-control" name="rate"
                                        value="{{ $value->rate }}" id="">


                                </div>
                            </div>
                        @endif


                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-light">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
