<div class="modal fade print printme" id="attendance-{{ $value->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Attendance List</b>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive pt-5">
                    <table id="example4" class="display">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Week</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Note</th>


                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($value->attendance as $key => $value2)
                                <tr class="" style=" background-color:{{ $value2->status_color }};">
                                    <td>{{ $value2->date }}</td>
                                    <td>Week {{ auth()->user()->week($value2->updated_at) }}</td>
                                    <td>{{ $value2->enquirySubject->subject->name }}</td>
                                    <td>{{ $value2->statusName() }}</td>
                                    <td>{{ $value2->note }}</td>



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
