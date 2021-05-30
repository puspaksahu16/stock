@extends('layouts.app')
@section('products')
    mm-active
@endsection
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold" style="margin-top: 20px;">Create Product</h1>
                    {{--<small>From now on you will start your activities.</small>--}}
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <!--/.Content Header (Page header)-->
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-12">
            <div class="body-content">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Product</h6>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-primary"> <i class="typcn typcn-arrow-back-outline"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card mb-8">
                            <div class="card-body">
                                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="Product name" class="col-sm-3 col-form-label font-weight-600">Product name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{old('name')}}"  type="text" name="name" id="name">
                                        </div>
                                        @error('name')
                                        <div class="text-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="Product Code" class="col-sm-3 col-form-label font-weight-600">Product Code</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text"  value="{{old('product_code')}}" name="product_code" id="product_code">
                                        </div>
                                        @error('product_code')
                                        <div class="text-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="Price" class="col-sm-3 col-form-label font-weight-600">Price </label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="price" id="price">
                                        </div>
                                    </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="Model No" class="col-sm-3 col-form-label font-weight-600">Model No.</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="model_no" id="model_no">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Brand" class="col-sm-3 col-form-label font-weight-600">Brand</label>
                                            <select class="form-control" name="brand_id">
                                                <option value="">-select-</option>
                                                @foreach($brand as $brand)
                                                    <option value="{{ $brand -> id }}">{{ $brand->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Size" class="col-sm-3 col-form-label font-weight-600">Size </label>
                                            <select class="form-control" name="size_id">
                                                <option value="">-select-</option>
                                                @foreach($size as $size)
                                                    <option value="{{ $size -> id }}">{{ $size->product_size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Price" class="col-sm-3 col-form-label font-weight-600">Image </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="image" id="price">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="Colour" class="col-sm-3 col-form-label font-weight-600">Color</label>
                                            <select class="form-control" name="colour_id">
                                                <option value="">-select-</option>
                                                @foreach($colour as $colour)
                                                    <option value="{{ $colour -> id }}">{{ $colour->product_colour }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <label for="HSN" class="col-sm-3 col-form-label font-weight-600">HSN Code </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="hsn" id="hsn">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="description" class="col-sm-3 col-form-label font-weight-600">Description</label>
                                            <div class="col-sm-9">
                                                <textarea name="description" ></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group row" style="text-align: right">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                        <input type="submit" class="btn btn-primary" >
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.body content-->
@endsection