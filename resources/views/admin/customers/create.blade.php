@extends('layouts.app')
@section('customers')
    mm-active
@endsection
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Customer</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold" style="margin-top: 20px;">Create Customer</h1>
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
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="body-content">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Customer</h6>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('customers.index') }}" class="btn btn-primary"> <i class="typcn typcn-arrow-back-outline"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card mb-6">
                            <div class="card-body">
                                <form method="POST" action="{{ route('customers.store') }}">
                                    {{ csrf_field()}}
                                    <div class="form-group row">
                                        <label for="Customer name" class="col-sm-3 col-form-label font-weight-600">Full name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="full_name" id="full_name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="HSN" class="col-sm-3 col-form-label font-weight-600">Email </label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="email" name="email" id="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label font-weight-600">Mobile</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="mobile" id="mobile">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Contact Person No." class="col-sm-3 col-form-label font-weight-600">Contact Person No.</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="concat_person_no" id="concat_person_no">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="GST No." class="col-sm-3 col-form-label font-weight-600">GST No.</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="gst" id="gst">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Price" class="col-sm-3 col-form-label font-weight-600">Address </label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address" id="address"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="State" class="col-sm-3 col-form-label font-weight-600">State </label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="state" id="state">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Zip" class="col-sm-3 col-form-label font-weight-600">Zip </label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="zip" id="zip">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Country" class="col-sm-3 col-form-label font-weight-600">Country </label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="country" id="country">
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
            </div>
        </div>
    </div>
    <!--/.body content-->
@endsection