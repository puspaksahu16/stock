@extends('layouts.app')
@section('Challan')
    mm-active
@endsection
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Challan</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold" style="margin-top: 20px;">Edit Challan</h1>
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
                        <h6 class="fs-17 font-weight-600 mb-0">Challan</h6>
                    </div>
                    <div class="text-right">
                       <a href="{{ route('challans.index') }}" class="btn btn-primary"> <i class="typcn typcn-arrow-back-outline"></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('challans.update', $challan->id) }}" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            {{ method_field('put')}}
                            <div class="card mb-4">
                                <div class="card-body">

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="Challan No" class="">Challan No</label>
                                                <input class="form-control" value="{{ $challan->challan_no }}" type="text" name="challan_no" id="challan_no">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="Customer Name" class="">Customer Name</label>
                                                <input class="form-control" value="{{$challan->customer_name}}" type="text" name="customer_name" id="customer_name">
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="Date" class="">Date</label>
                                                <input class="form-control" value="{{$challan->date}}" type="date" name="date" id="date">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="Address" class="">Address</label>
                                                <textarea name="address" id="address">{{$challan->address}}</textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <div class="form-group row" v-for="(row, index) in rowData">
                                            <div class="col-md-2">
                                                <label for="Product name" class="">Product Name</label>
                                                <input class="form-control"  type="text" v-model="row.product_name" name="product_name" id="product_name">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="Quantity" class="">Quantity</label>
                                                <input  class="form-control" type="number" v-model="row.quantity" name="quantity" id="quantity" >
                                            </div>
                                            <div class="col-md-2">
                                                <label for="Rate" class="">Rate</label>
                                                <input class="form-control"  v-model="row.rate" type="number" name="rate" id="rate">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="Total" class="">Total</label>
                                                <input class="form-control" type="number"  v-model="row.total_price" name="total_price" id="total_price">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="Description" class="">Description</label>
                                                <textarea name="description" id="description"></textarea>
                                            </div>
                                            <div class="col-md-2" >
                                                <button @click="removeItem(index)" class="btn btn-danger btn-sm">Remove</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <button @click="addItem()"  class="btn btn-success btn-sm">Add row</button>

                                        <div class="form-group row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <input type="submit" value="Save" class="btn btn-primary btn-lg" >
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->
@endsection