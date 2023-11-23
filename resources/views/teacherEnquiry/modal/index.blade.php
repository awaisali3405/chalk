<div class="modal fade print printme" id="notification-{{ $value->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Interview List</b>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('enquiry.send.interview', $value->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="interview-date" class="form-label">Interview Date</label>
                                <input type="date" class="form-control" name="date" id="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="interview-time" class="form-label">Interview Time</label>
                                <input type="time" class="form-control" name="time" id="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group pt-4">

                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive pt-5">
                    <table id="example5" class=" example5 display">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Send Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($value->interview as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ auth()->user()->ukFormat($value->date) }}</td>
                                    <td>{{ auth()->user()->timeFormat($value->time) }}</td>
                                    <td> {{ auth()->user()->ukFormat($value->created_at->toDateString()) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
