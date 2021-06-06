@extends('layouts.app')
@section('invoices')
    mm-active
@endsection
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Invoices</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold" style="margin-top: 20px;">Invoices</h1>
                    {{--<small>From now on you will start your activities.</small>--}}
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            @if(is_array(session()->get('success')))
                <ul>
                    @foreach (session()->get('success') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session()->get('success') }}
            @endif
        </div>
    @endif

    <!--/.Content Header (Page header)-->
    <div class="body-content">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 font-weight-600 mb-0">Products</h6>
                    </div>
                    <div class="text-right">
                       <a href="{{ route('invoices.create') }}" class="btn btn-primary">+ Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display table-bordered table-striped table-hover basic">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice No</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Paid</th>
                                <th scope="col">Due</th>
                                <th scope="col">Issue Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $key =>$invoice)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>#{{ $invoice->invoice_no }}</td>
                                    <td>{{ $invoice->customer->full_name }}</td>
                                    <td>{{ $invoice->grand_total }} /-</td>
                                    <td>{{ $invoice->total_paid }} /-</td>
                                    <td>{{ $invoice->grand_total - $invoice->total_paid}} /-</td>
                                    <td>{{ $invoice->issue_date }}</td>
                                    <td>
                                        <a href="{{route('invoices.show', $invoice->id)}}" class="btn btn-sm btn-info"><i class="typcn typcn-eye-outline"></i></a>
                                        <a href="{{url('/invoices/payment/'. $invoice->id)}}" class="btn btn-sm btn-info" title="Pay"><i class="typcn typcn-credit-card"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.body content-->
@endsection