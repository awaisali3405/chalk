<div class="modal fade print printme" id="attendance-{{ $value->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Attendace</b>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('staff.attendance.update', $value->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" value="{{ $value->date }}"
                                    id="">


                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Staff Time</label>
                                <input type="time" class="form-control" name="start_time"
                                    value="{{ $value->start_time }}" id="">


                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">End Time</label>
                                <input type="time" class="form-control" name="end_time"
                                    value="{{ $value->end_time }}" id="">


                            </div>
                        </div>
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
                            <button type="submit" class="btn btn-light">Cencel</button>
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
