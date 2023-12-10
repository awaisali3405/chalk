@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Purchase</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Purchase</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Purchase</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Purchase</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('purchase.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Branch</label>
                                            <select class="form-control branch" name="branch_id" id="branch_id" required>
                                                <option value="">Select Branch</option>
                                                @foreach ($branch as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Supplier</label>
                                            <select class="form-control" name="supplier_id" required>
                                                <option value="">Select Supplier</option>
                                                @foreach ($supplier as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Key Stage</label>
                                            <select class="form-control keyStage" name="key_stage_id" required>
                                                <option value="">-</option>
                                                @foreach ($keyStage as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Year</label>
                                            <select class="form-control year" name="year_id" required>


                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Resource</label>
                                            <select class="form-control product" name="product_id" required>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Quantity</label>
                                            <input class="form-control quantity " name="quantity" value="0" required>


                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Rate</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">£</div>
                                                </div>
                                                <input type="number" step="0.01" class="form-control rate"
                                                    name="rate" value="0" required>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">£</div>
                                                </div>
                                                <input type="text" class="form-control amount" name="amount" readonly
                                                    required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label d-flex">Discount Type

                                            </label>
                                            <div class="row pl-2 justify-content-center">
                                                <div class="col-3">
                                                    <input type="radio" name="is_discount_price" class="is-discount-price"
                                                        value="0" id="percentage">
                                                    <label for="percentage pt-3">%</label>
                                                </div>
                                                <div class="col-3">
                                                    <input type="radio" name="is_discount_price" class="is-discount-price"
                                                        value="1" id="price" checked>
                                                    <label for="price pt-3">£</label>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label d-flex">Discount

                                            </label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text symbol">£</div>
                                                </div>
                                                <input type="number" step="0.01"
                                                    class="form-control discount_purchase" name="discount" value="0"
                                                    required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label d-flex">Discount Amount

                                            </label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">£</div>
                                                </div>
                                                <input type="number" step="0.01"
                                                    class="form-control  discounted_amount amount"
                                                    name="discounted_amount" value="0" required readonly>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mode</label>
                                            <select class="form-control" name="mode">
                                                <option value="Cash">Cash</option>
                                                <option value="Bank">Bank</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date</label>
                                            <input type="date" class="form-control " name="date" required>


                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('product.index') }}" class="btn btn-light">Cancel</a>
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
