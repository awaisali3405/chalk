@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Transfer Product</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Product</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Transfer Product</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h5 class="">Quantity: {{ $product->purchase->sum('quantity') }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.transfer.store', $product->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        Orginal Stock
                                    </div>
                                    <div class="col-6">
                                        Transfer Stock
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Year</label>
                                            <select class="form-control" disabled>
                                                <option value="">Select Year</option>
                                                @foreach ($year as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == $product->year_id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Year</label>
                                            <select class="form-control" name="year_id" required>
                                                <option value="">Select Year</option>
                                                @foreach ($year as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Branch</label>
                                            <select class="form-control" disabled>
                                                <option value="">Select Branch</option>
                                                @foreach ($branch as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == $product->branch_id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Branch</label>
                                            <select class="form-control" name="branch_id" required>
                                                <option value="">Select Branch</option>
                                                @foreach ($branch as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Quantity</label>
                                            <input type="text" class="form-control" id="quantity-o"
                                                value="{{ $product->purchase->sum('quantity') }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Quantity</label>
                                            <input type="number" class="form-control" name="quantity" id="t-quantity"
                                                max="{{ $product->purchase->sum('quantity') }}" value="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Rate</label>
                                            <input type="number" class="form-control" name="rate"
                                                value="{{ count($product->purchase) > 0 ? number_format($product->purchase[0]->rate) : 0 }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Rate</label>
                                            <input type="number" class="form-control" name="rate" id="t-rate"
                                                value="0">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Total</label>
                                            <input type="number" class="form-control" name="total" id="t-total"
                                                value="0" disabled>
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
    <script>
        $('#quantity').on('keyup', fucntion() {
            quantity = $(this).val();
            quantity_o = $('#quantity-o').val();
            if (parseInt(quantity) > parseInt(quantity_o)) {
                $('#quantity').removeClass('d-none');
            } else {
                $('#quantity').addClass('d-none');
                $('#quantity-o').val(quantity - quantity_o);

            }
        })
    </script>
@endsection
