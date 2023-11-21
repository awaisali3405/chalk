<div class="modal fade print printme" id="notification-{{ $student->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Attendance Detail</b>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive pt-5">
                    <table id="example5" class="display">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Note</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student->attendance as $key => $value)
                                <tr>
                                    <td>{{ $value->date }}</td>

                                    <td>{{ $value->enquirySubject->subject->name }}</td>
                                    <td>{{ $value->statusName() }}</td>
                                    <td>{{ $value->note }}</td>



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
