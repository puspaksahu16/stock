@extends('layouts.app')
@section('blog')
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
                    <h1 class="font-weight-bold" style="margin-top: 20px;">Edit Product</h1>
                    {{--<small>From now on you will start your activities.</small>--}}
                </div>
            </div>
        </div>
    </div>
    <!--/.Content Header (Page header)-->
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
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            {{ method_field('put')}}
                            <div class="form-group row">
                                <label for="Product name" class="col-sm-3 col-form-label font-weight-600">Product name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="{{ $product->name }}" name="name" id="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Product code" class="col-sm-3 col-form-label font-weight-600">Product Code</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="{{ $product->product_code }}" name="product_code" id="product_code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Product name" class="col-sm-3 col-form-label font-weight-600">Model No</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="{{ $product->model_no }}" name="model_no" id="model_no">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Image" class="col-sm-3 col-form-label font-weight-600">Image</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" value="{{old('image')}}" name="image" id="image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Colour" class="col-sm-3 col-form-label font-weight-600">Colour</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="colour_id">
                                        <option value="">-select-</option>
                                        @foreach($colour as $colour)
                                            <option value="{{ $colour -> id }}">{{ $colour->product_colour }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Brand" class="col-sm-3 col-form-label font-weight-600">Brand</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="brand_id">
                                        <option value="">-select-</option>
                                        @foreach($brand as $brand)
                                            <option value="{{ $brand -> id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Brand" class="col-sm-3 col-form-label font-weight-600">Size</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="size_id">
                                        <option value="">-select-</option>
                                        @foreach($size as $size)
                                            <option value="{{ $size -> id }}">{{ $size->product_size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="HSN" class="col-sm-3 col-form-label font-weight-600">HSN Code </label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="{{ $product->hsn }}" name="hsn" id="hsn">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label font-weight-600">Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Price" class="col-sm-3 col-form-label font-weight-600">Price </label>
                                <div class="col-sm-9">
                                    <input class="form-control" value="{{ $product->price }}" type="text" name="price" id="price">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <div class="custom-control col-sm-3 custom-radio custom-control-inline">
                                        <input {{ $product->is_active == 1 ? 'checked' : '' }} type="radio" id="customRadioInline1" name="is_active" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="customRadioInline1">Active</label>
                                    </div>
                                    <div class="custom-control col-sm-3 custom-radio custom-control-inline">
                                        <input type="radio" {{ $product->is_active == 0 ? 'checked' : '' }} id="customRadioInline2" name="is_active" class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <input type="submit" class="btn btn-primary" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->
@endsection