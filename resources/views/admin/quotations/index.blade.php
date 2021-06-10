@extends('layouts.app')
@section('quotations')
    mm-active
@endsection
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Quotation</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold" style="margin-top: 20px;">Quotation</h1>
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
                        <h6 class="fs-17 font-weight-600 mb-0">Quotation</h6>
                    </div>
                    <div class="text-right">
                       <a href="{{ route('quotations.create') }}" class="btn btn-primary">+ Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table display table-bordered table-striped table-hover ordering dataTable" >
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Quote No</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Issue Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quotes as $key => $quote)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>#{{ $quote->quote_no }}</td>
                                <td>{{ $quote->customer->full_name }}</td>
                                <td>{{ $quote->grand_total }} /-</td>
                                <td>{{ $quote->issue_date }}</td>
                                <td>
                                    <div class="btn-group">
                                        {{--<a href="{{ route('products.edit', $quote->id) }}" class="btn btn-sm btn-warning"><i class="typcn typcn-pencil"></i></a>--}}
                                        <a href="{{ route('quotations.show', $quote->id) }}" class="btn btn-sm btn-info"><i class="typcn typcn-eye-outline"></i></a>
                                        {{--<form action="{{ route('products.destroy', $quote->id) }}" method="POST">--}}
                                        {{--{{ csrf_field() }}--}}
                                        {{--{{ method_field('delete') }}--}}
                                        {{--<button type="submit" class="btn btn-sm btn-danger"><i class="typcn typcn-trash"></i></button>--}}
                                        {{--</form>--}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.body content-->
@endsection