@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Notification</h4>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <form action="{{ route('generalNotification.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Send Notification</h5>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">People</label>
                                                    <select name="branch_id" class="form-control" id="people" required>
                                                        <option value="" selected disabled>Select People</option>
                                                        <option value="1">All People</option>
                                                        <option value="2">All Staff</option>
                                                        <option value="3">All Parents</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Subject</label>
                                                    <input type="text" class="form-control" name="subject" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Message</label>
                                                    <textarea name="message" class="summernote" id="" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="checkbox" name="messageType[]" value="email"
                                                        id="email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="sms">SMS</label>
                                                    <input type="checkbox" name="messageType[]" value="sms"
                                                        id="sms">
                                                </div>
                                            </div>


                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="{{ route('generalNotification.index') }}"
                                                    class="btn btn-light">Cancel</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">Enquiry Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-12 table-responsive">
                                                <table id="" class="display dataTable " style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="" id="check_all">
                                                            </th>
                                                            <th>
                                                                Name
                                                            </th>
                                                            <th>
                                                                Type
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="people-list">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
