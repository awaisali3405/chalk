@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Note</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Note</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Note</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Note Info</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('enquiryTeacher.note.store', $enquiry->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="row">
                                        <div class="col-xl-12 col-xxl-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Note</h4>
                                                </div>
                                                <div class="card-body">
                                                    <textarea name="note" class="summernote">{{ $enquiry->note }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- {!! Form::textarea('description', null, ['class' => 'form-control summernote', 'id' => 'summernote']) !!} --}}
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('enquiryTeacher.index') }}" class="btn btn-light">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
