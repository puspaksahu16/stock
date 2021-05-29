@extends('layouts.app')
@section('models')
    mm-active
@endsection
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Models</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold" style="margin-top: 20px;">Create Model</h1>
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
                                <h6 class="fs-17 font-weight-600 mb-0">Model</h6>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('models.index') }}" class="btn btn-primary"> <i class="typcn typcn-arrow-back-outline"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card mb-8">
                            <div class="card-body">
                                <form method="POST" action="{{ route('models.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="Model" class="col-sm-3 col-form-label font-weight-600">Model name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="model" id="model">
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