@extends('layouts.app')

@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold" style="margin-top: 20px;">Edit Profile</h1>
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
                        <h6 class="fs-17 font-weight-600 mb-0">Profile</h6>
                    </div>
                    <div class="text-right">
                       <a href="{{ route('customers.index') }}" class="btn btn-primary"> <i class="typcn typcn-arrow-back-outline"></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/profile-edit/') }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="Company name" class="col-sm-3 col-form-label font-weight-600">Company name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="{{ !empty($profile->name) ? $profile->name : (!empty($user->name) ? $user->name : '') }}" name="name" id="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Email" class="col-sm-3 col-form-label font-weight-600">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="email" value="{{ !empty($profile->email) ? $profile->email : (!empty($user->name) ? $user->email : '') }}" name="email" id="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Mobile" class="col-sm-3 col-form-label font-weight-600">Mobile</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" value="{{ !empty($profile->mobile) ? $profile->mobile : '' }}" name="mobile" id="mobile">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="GST No." class="col-sm-3 col-form-label font-weight-600">GST No.</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="{{ !empty($profile->gst) ? $profile->gst : '' }}" name="gst" id="gst">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Address" class="col-sm-3 col-form-label font-weight-600">Address</label>
                                <div class="col-sm-9">
                                    <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ !empty($profile->address) ? $profile->address : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="State" class="col-sm-3 col-form-label font-weight-600">State </label>
                                <div class="col-sm-9">
                                    <input class="form-control" value="{{ !empty($profile->state) ? $profile->state : '' }}" type="text" name="state" id="state">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Zip" class="col-sm-3 col-form-label font-weight-600">Zip </label>
                                <div class="col-sm-9">
                                    <input class="form-control" value="{{ !empty($profile->zip) ? $profile->zip : '' }}" type="text" name="zip" id="zip">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Country" class="col-sm-3 col-form-label font-weight-600">Country </label>
                                <div class="col-sm-9">
                                    <input class="form-control" value="{{ !empty($profile->country) ? $profile->country : '' }}" type="text" name="country" id="country">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Address" class="col-sm-3 col-form-label font-weight-600">Invoice Note</label>
                                <div class="col-sm-9">
                                    <textarea name="invoice_note" class="form-control" id="exampleFormControlTextarea2" rows="3">{{ !empty($profile->invoice_note) ? $profile->invoice_note : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Address" class="col-sm-3 col-form-label font-weight-600">Quotation Note</label>
                                <div class="col-sm-9">
                                    <textarea name="quotation_note" class="form-control" id="exampleFormControlTextarea3" rows="3">{{ !empty($profile->quotation_note) ? $profile->quotation_note : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Address" class="col-sm-3 col-form-label font-weight-600">Challan Note</label>
                                <div class="col-sm-9">
                                    <textarea name="challan_note" class="form-control" id="exampleFormControlTextarea4" rows="3">{{ !empty($profile->challan_note) ? $profile->challan_note : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Country" class="col-sm-3 col-form-label font-weight-600">Logo</label>
                                <div class="col-sm-9">
                                    <input class="form-control" value="{{ !empty($profile->logo) ? $profile->logo : '' }}" type="file" name="logo" id="logo">
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