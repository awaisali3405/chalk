<div class="modal fade print printme" id="history-{{ $value->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">People List</b>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive pt-5">
                    <table id="example5" class="display">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Name</th>
                                <th>Type</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($value->people as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->type }}</td>
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
