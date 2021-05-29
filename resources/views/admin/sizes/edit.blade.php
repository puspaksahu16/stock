@extends('layouts.app')
@section('size')
    mm-active
@endsection
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Sizes</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold" style="margin-top: 20px;">Edit Size</h1>
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
                        <h6 class="fs-17 font-weight-600 mb-0">Size</h6>
                    </div>
                    <div class="text-right">
                       <a href="{{ route('sizes.index') }}" class="btn btn-primary"> <i class="typcn typcn-arrow-back-outline"></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('sizes.update', $size->id) }}" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            {{ method_field('put')}}
                            <div class="form-group row">
                                <label for="Product size" class="col-sm-3 col-form-label font-weight-600">Product Size</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="{{ $size->product_size }}" name="product_size" id="product_size">
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