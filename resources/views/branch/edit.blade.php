@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Branch</h4>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Branch</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('branch.update', $branch->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                {{-- @dd($branch) --}}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Branch Name</label>
                                            <input type="text" class="form-control" value="{{ $branch->name }}"
                                                name="name">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Bank Name</label>
                                            <input type="text" class="form-control" value="{{ $branch->bank_name }}"
                                                name="bank_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Company Registration Number</label>
                                            <input type="text" class="form-control" name="company_number"
                                                value="{{ $branch->company_number }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Account Number</label>
                                            <input type="text" class="form-control" value="{{ $branch->account_number }}"
                                                name="account_number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Branch Code </label>
                                            <input type="text" class="form-control"
                                                value="{{ old('short_code', $branch->short_code) }}" name="short_code">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Sort Code </label>
                                            <input type="text" class="form-control"
                                                value="{{ old('branch_code', $branch->branch_code) }}" name="branch_code">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Vat Registration Number</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('vat_reg_no', $branch->vat_reg_no) }}" name="vat_reg_no">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Phone </label>
                                            <input type="text" class="form-control" value="{{ $branch->phone_number }}"
                                                name="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" value="{{ $branch->email }}"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">First Address</label>
                                            <input type="text" id="formatted_address_0"
                                                value="{{ $branch->res_address }}" class="form-control" name="res_address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Second Address Line </label>
                                            <input type="text" id="formatted_address_1"
                                                value="{{ $branch->res_second_address }}" class="form-control"
                                                name="res_second_address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Third Address Line</label>
                                            <input type="text" id="formatted_address_2"
                                                value="{{ $branch->res_third_address }}" class="form-control"
                                                name="res_third_address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Town</label>
                                            <input type="text" id="town_or_city" value="{{ $branch->res_town }}"
                                                class="form-control" name="res_town">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> County </label>
                                            <input type="text" id="county" value="{{ $branch->res_country }}"
                                                class="form-control" name="res_country">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Postcode</label>
                                            <input type="text" id="postcode" value="{{ $branch->res_postal_code }}"
                                                class="form-control" name="res_postal_code">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Tax</label>
                                            <select name="tax_type" id="tax_type" class="form-control" id="">
                                                <option value="vat" {{ $branch->tax_type == 'vat' ? 'selected' : '' }}>
                                                    Standard Vat Tax</option>
                                                <option value="no_vat"
                                                    {{ $branch->tax_type == 'no_vat' ? 'selected' : '' }}>Non
                                                    Vat Tax</option>
                                                <option value="flat"
                                                    {{ $branch->tax_type == 'flat' ? 'selected' : '' }}>Flat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 tax">
                                        <div class="form-group">
                                            <label class="form-label"> Tax %</label>
                                            <input type="text" id="" class="form-control tax-input"
                                                name="tax" value='{{ $branch->tax }}'>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="submit" class="btn btn-light">Cancel</button>
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
