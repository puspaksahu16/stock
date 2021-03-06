@extends('layouts.app')
@section('invoices')
    mm-active
@endsection
@section('content')
    <div class="content-header row align-items-center m-0" >
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Invoice</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold" style="margin-top: 20px;">Create Invoice</h1>
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
    <div class="row" id="invoice">
        <div class="col-md-12">
            <div class="body-content">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Invoice</h6>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-primary"> <i class="typcn typcn-arrow-back-outline"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-body">
                                {{--<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">--}}
                                    {{--{{ csrf_field()}}--}}

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="Invoice No" class="">Invoice No</label>
                                            <input class="form-control" value="{{ "#".$invoice_no }}" readonly type="text" name="invoice_no" id="invoice_no">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="Customer" class="">Customer</label>
                                            <select class="form-control" v-model="customer_id" name="customer_id">
                                                <option value="">-select-</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 pt-5">
                                            <a href="{{ route('customers.create') }}" class="btn btn-success btn-sm">Add Customer</a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="Issue Date" class="">Issue Date</label>
                                            <input class="form-control" type="date" v-model="issue_date" name="issue_date" id="issue_date">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Challan_no" class="">Challan No</label>
                                            {{--<select class="form-control placeholder-multiple select2-hidden-accessible" @click="getChallan()" v-model="challanNo" name="challan_no" multiple="" data-select2-id="13" tabindex="-1" aria-hidden="true">--}}
                                            <select class="form-control select2" @click="getChallan()" v-model="challanNo" name="challan_no" multiple="">
                                                <option value="">-Select-</option>
                                                @foreach($challans as $challan)
                                                    <option value="{{ $challan->id }}">{{ $challan->challan_no }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="form-group row" v-for="(row, index) in rowData">

                                        <div class="col-md-2">
                                            <label for="Product Code" class="">Product Code</label>
                                            <select @change="getProductDetails(index)" :readonly="checkReadonly" class="form-control search-txt" v-model="row.product_id" name="product_code">
                                                <option>-select-</option>
                                                <option v-for="product in availableProducts" :value=" [product.id, product.name, product.price, product.hsn] ">@{{ product.product_code }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="HSN" class="">HSN</label>
                                            <input class="form-control" readonly type="text" v-model="row.hsn" name="hsn" id="hsn">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="Product name" class="">Product Name</label>
                                            <input class="form-control" readonly type="text" v-model="row.product_name" name="product_name" id="product_name">
                                        </div>
                                        <div class="col-md-1">
                                            <label for="Quantity" class="">Quantity</label>
                                            <input @keyup="getTotalPrice(index)" @change="getTotalPrice(index)" :readonly="checkReadonly" class="form-control" type="number" v-model="row.quantity" name="quantity" id="quantity" >
                                        </div>
                                        <div class="col-md-1">
                                            <label for="Price" class="">Price/unit</label>
                                            <input class="form-control" readonly v-model="row.price" type="text" name="price" id="price">
                                        </div>
                                        <div class="col-md-1">
                                            <label for="Price" class="">GST</label>
                                            <select @change="getTotalPrice(index)" class="form-control search-txt" :readonly="checkReadonly" v-model="row.gst" name="gst">
                                                <option value="">-Select-</option>
                                                <option value="0">GST@0%</option>
                                                <option value="3">GST@3%</option>
                                                <option value="5">GST@5%</option>
                                                <option value="12">GST@12%</option>
                                                <option value="18">GST@18%</option>
                                                <option value="28">GST@28%</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="Price" class="">Discount</label>
                                            <input @keyup="getTotalPrice(index)" @change="getTotalPrice(index)" :readonly="checkReadonly" class="form-control" type="number" placeholder="In %" v-model="row.discount" name="discount" id="discount">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="Price" class="">Total Price</label>
                                            <input class="form-control" readonly type="text" v-model="row.total_price" name="total_price" id="total_price">
                                        </div>
                                        <div class="col-md-1 pt-5">
                                            <button v-if="(challanNo.length == 0)" @click="removeItem(index)" class="btn btn-danger btn-sm">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <button v-if="(challanNo.length == 0)" @click="addItem()"  class="btn btn-success btn-sm">Add row</button>

                                    {{--<div class="form-group row">--}}
                                        {{--<div class="col-md-9"></div>--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<strong>Sub Total : @{{ subTotal }} /-</strong>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="form-group row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                            <strong>Discount : @{{ discount }} /-</strong>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                            <strong>GST : @{{ gst }} /-</strong>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                            <strong>Grant Total : @{{ grandTotal }} /-</strong>
                                        </div>
                                    </div>
                                    {{--<div class="form-group row">--}}
                                        {{--<div class="col-md-6"></div>--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<label for="Payment Type" class="">Payment Type</label>--}}
                                            {{--<select class="form-control search-txt" v-model="payment_type" name="payment_type">--}}
                                                {{--<option value="">-Select-</option>--}}
                                                {{--<option value="Cash">Cash</option>--}}
                                                {{--<option value="Bank">Bank</option>--}}
                                                {{--<option value="Cheque">Cheque</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<label for="Receive Amount" class="">Receive Amount</label>--}}
                                            {{--<input class="form-control" v-model="receive_amount" type="text" name="receive_amount" placeholder="Receive Amount" id="receive_amount">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="form-group row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-4">
                                            <input type="submit" @click="submitData()" value="Save" class="btn btn-primary btn-lg" >
                                        </div>
                                    </div>
                                {{--</form>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.body content-->
    <script>
        var PRODUCTS = {!! $products !!};
        var AVAILABLE_PRODUCT = {!! $available_products !!};
    </script>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    var invoice = new Vue({
        el: '#invoice',
        data: {
            products:PRODUCTS,
            availableProducts:AVAILABLE_PRODUCT,
            checkReadonly: false,
            subTotal: 0,
            customer_id: '',
            issue_date: '',
            // payment_type: '',
            // receive_amount: '',
            challanNo: [],
            discount: 0,
            gst: 0,
            grandTotal: 0,
            sp:[{}],
            rowData:[
                {
                    product_id: '',
                    product_name: '',
                    hsn:'',
                    price: '',
                    discount: '',
                    gst:'',
                    total_price: '',
                    quantity: '',
                }] //the declared array
        },

        methods:{
            getChallan(){
                let that = this;
                axios.post('/get_challan_details', {
                    challan_no: that.challanNo,
                    // challan_no: JSON.stringify(that.challanNo),
                })
                    .then(function (response) {
                        console.log(response);
                        that.rowData = response.data;
                        that.availableProducts = that.products;
                        that.checkReadonly = true;

                        that.getTotalPrice(0);
                        // let index = sid;
                        // that.$set(that.sp, [index],response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getProductDetails(index){
                this.rowData[index].product_name = this.rowData[index].product_id[1];
                this.rowData[index].price = this.rowData[index].product_id[2];
                this.rowData[index].hsn = this.rowData[index].product_id[3];
                this.getTotalPrice(index);
            },
            checkSubTotal(){
                var st = 0;
                this.rowData.forEach((value, index) => {
                    st += value.total_price;
                });
                return st;
            },
            totalDiscount(){
                var D = 0;
                this.rowData.forEach((value, index) => {

                    D += this.checkDiscount(parseInt(value.price) * parseInt(value.quantity),value.discount);
                    // D += (parseInt(value.price) * parseInt(value.quantity)) * (parseInt(value.discount) / 100);
                });
                return D;
            },
            totalGST(){
                var gst = 0;
                this.rowData.forEach((value, index) => {

                    gst += this.checkGST(parseInt(value.price) * parseInt(value.quantity),value.gst);
                    // D += (parseInt(value.price) * parseInt(value.quantity)) * (parseInt(value.discount) / 100);
                });
                return gst;
            },
            checkDiscount(total_price,discount){
                var discountPrice = 0;
                if (discount == null) {
                    discountPrice = 0;
                } else if (discount == 0){
                    discountPrice = 0;
                }else{
                    discountPrice = (parseInt(total_price) * (parseInt(discount) / 100));
                }
                return discountPrice;
            },

            checkGST(total_price,gst){
                var gstPrice = 0;
                if (gst == null) {
                    gstPrice = 0
                } else if (gst == 0){
                    gstPrice = 0
                }else{
                    gstPrice = (parseInt(total_price) * (parseInt(gst) / 100));
                }
                return gstPrice;
            },
            getTotalPrice(index){
                var price = this.rowData[index].product_id[2];
                var quantity = this.rowData[index].quantity;
                var total_price = parseInt(price) * parseInt(quantity);
                var discount = this.rowData[index].discount;
                var gst = this.rowData[index].gst;
                var discountPrice = this.checkDiscount(total_price,discount);
                var gstPrice = this.checkGST(total_price,gst);
                // this.rowData[index].total_price = parseInt(total_price);
                // this.rowData[index].total_price = parseInt(total_price) - parseInt(discountPrice) + parseInt(gstPrice);
                this.rowData[index].total_price = parseInt(total_price) + parseInt(gstPrice) - parseInt(discountPrice);
                // this.subTotal = this.checkSubTotal();
                this.discount = this.totalDiscount();
                this.gst = this.totalGST();
                this.grandTotal = this.checkSubTotal() ;
                // this.grandTotal = parseInt(this.subTotal) + parseInt(this.gst) - parseInt(this.total_price) ;
            },

            addItem(){
                var my_object = {
                    product_id: '',
                    product_name: '',
                    price: '',
                    discount: '',
                    gst:'',
                    total_price: '',
                    quantity: '',
                };
                this.rowData.push(my_object);
                this.availableProducts = this.availableProducts;
            },
            removeItem(index){
                this.rowData.splice(index, 1);
                this.subTotal = this.checkSubTotal();
                this.discount = this.totalDiscount();
            },
            fetchProductDetails(sid){
                let that = this;
                axios.post('/fetchProductDetails', {
                    product_id: that.rowData[sid].product_id,
                })
                    .then(function (response) {
                        console.log(response);
                        let index = sid;
                        that.$set(that.sp, [index],response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            submitData(){
                let that = this;
                axios.post('/billing/store_data', {
                    challan_nos: that.challanNo,
                    customer_id: that.customer_id,
                    issue_date: that.issue_date,
                    total_discount: that.discount,
                    total_gst: that.gst,
                    grand_total: that.grandTotal,
                    product_details: that.rowData,
                    // payment_type: that.payment_type,
                    // receive_amount: that.receive_amount,
                })
                    .then(function (response) {
                        console.log(response);
                        window.location ="/invoices";
                        // swal("Good job!", "You clicked the button!", "success");
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    })
</script>
@endpush