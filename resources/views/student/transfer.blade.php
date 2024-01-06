<div class="modal fade print printme" id="transfer-{{ $value->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Branch Transfer</b>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
            </div>
            <form action="{{ route('student.transfer', $value->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-text" class="form-label">Branch</label>
                                <select name="branch_id" class="form-control" id="" required>
                                    @foreach ($branch as $value2)
                                        @if ($value->branch_id != $value2->id)
                                            <option value="{{ $value2->id }}">{{ $value2->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-text" class="form-label">Academic Year</label>
                                <select name="academic_year_id" class="form-control" id="" required>
                                    @foreach ($academicCalender as $value2)
                                        <option value="{{ $value2->id }}"
                                            {{ $value2->id ==auth()->user()->session()->id? 'selected': '' }}>
                                            {{ $value2->period() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="interview-text" class="form-label">Year</label>
                                <select name="year_id" class="form-control" id="">
                                    @foreach ($year as $value2)
                                        @if ($value2->id >= $value->currentYear()->id)
                                            <option value="{{ $value2->id }}">{{ $value2->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pt-4">
                                <button type="submit" class="btn btn-primary">Transfer</button>
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
