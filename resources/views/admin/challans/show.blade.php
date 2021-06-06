@extends('layouts.app')
@section('challans')
    mm-active
@endsection
@section('content')
    <!--Content Header (Page header)-->
    {{--<div class="content-header row align-items-center m-0">--}}
        {{--<nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">--}}
            {{--<ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">--}}
                {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                {{--<li class="breadcrumb-item active">Invoice</li>--}}
            {{--</ol>--}}
        {{--</nav>--}}
        {{--<div class="col-sm-8 header-title p-0">--}}
            {{--<div class="media">--}}
                {{--<div class="header-icon text-success mr-3"><i class="typcn typcn-document-text"></i></div>--}}
                {{--<div class="media-body">--}}
                    {{--<h1 class="font-weight-bold">Invoice</h1>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--/.Content Header (Page header)-->
    <div class="body-content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        {{--<img src="assets/dist/img/mini-logo.png" class="img-fluid mb-3" alt="">--}}
                        @if(!empty($profile->logo))
                            <img src="{{asset('/images/logo/'.$profile->logo)}}" width="100px" height="100px">
                        @endif
                        <br>
                        <address>

                            <strong>{{ $profile->name }}</strong><br>
                            {{ !empty($profile->address) ? $profile->address : '' }}<br>
                            {{ !empty($profile->state) ? $profile->state : '' }},{{ !empty($profile->country) ? $profile->country : '' }},{{ !empty($profile->zip) ? $profile->zip : '' }}<br>
                            <abbr title="Phone">M:</abbr> {{ !empty($profile->mobile) ? $profile->mobile : '' }}
                        </address>
                    </div>
                    <div class="col-sm-6 text-right">
                        <h1 class="h3">Challan #{{$challan->challan_no}}</h1>
                        <div>Issued at {{$challan->issue_date}}</div>
                        {{--<div class="text-danger m-b-15">Payment due April 21th, 2017</div>--}}
                        <br>
                        <address>
                            <strong>{{$challan->customer->full_name}}</strong><br>
                            {{$challan->customer->address}}<br>
                            {{$challan->customer->state}}, {{$challan->customer->zip}}<br>
                            <abbr title="Phone">M:</abbr> {{$challan->customer->mobile}}<br>
                            <strong>{{$challan->customer->email}}</strong><br>
                        </address>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-nowrap">
                        <thead>
                        <tr>
                            <th>Item List</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>GST</th>
                            <th>Discount</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(json_decode($challan->product_details, true) as $product)
                        <tr>
                            <td><div><strong>{{$product['product_name']}}</strong></div>
                                {{--<small>{{$product['description']}}</small>--}}
                            </td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>{{ $product['price'] }} /-</td>
                            <td>{{ $product['gst'] }} %</td>
                            <td>{{ $product['discount'] }} %</td>
                            <td>{{ $product['total_price'] }} /-</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <p>{{ !empty($profile->challan_note) ? $profile->challan_note : '' }}</p>
                        <p><strong>Thank you very much for choosing us. It was a pleasure to have worked with you.</strong></p>
                        {{--<img src="assets/dist/img/credit/AM_mc_vs_ms_ae_UK.png" class="img-responsive" alt="">--}}

                    </div>
                    <div class="col-sm-4">
                        <ul class="list-unstyled text-right">
                            <li>
                                <strong>Discount:</strong> {{$challan->total_discount}} /-</li>
                            <li>
                                <strong>GST:</strong> {{$challan->total_gst}} /-</li>
                            <li>
                                <strong>Grand Total:</strong> {{$challan->grand_total}} /-</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-info mr-2" onclick="myFunction()"><span class="fa fa-print"></span></button>
                {{--<button type="button" class="btn btn-success"><i class="fa fa-dollar"></i> Make A Payment</button>--}}
            </div>
        </div>
    </div><!--/.body content-->
@endsection
