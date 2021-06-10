<?php

namespace App\Http\Controllers;

use App\Billing;
use App\challan;
use App\Customer;
use App\Payment;
use App\Product;
use App\Profile;
use App\Stock;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Billing::with('customer', 'payment')->get();

        foreach ($invoices as $invoice)
        {
            if ($invoice->payment){
                $total_paid = 0;
                foreach ($invoice->payment as $payment){
                    $total_paid += $payment->receive_amount;
                }
                $invoice->total_paid = $total_paid;
            }
        }

        return view('admin.billings.index', compact(['invoices']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stocks = stock::with('product')->get();
        $available_products = [];
        foreach ($stocks as $stock){
            array_push($available_products, $stock->product);
        }
        $available_products = collect($available_products);
        $products = Product::where('is_active', 1)->get();
        $challans = challan::all();
        $customers = Customer::where('is_active', 1)->get();
        $invoice = Billing::select("invoice_no")->orderBy('id', 'DESC')->first();
        $invoice_no = '';
        if ($invoice == null)
        {
            $invoice_no = 'INV1';
        }else{
            $ex =  explode('INV', $invoice->invoice_no);
            $invoice_no = 'INV'.($ex[1] + 1);
        }
        return view('admin.billings.create', compact(['products', 'invoice_no', 'customers', 'challans', 'available_products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeData(Request $request)
    {
        $invoice = Billing::select("invoice_no")->orderBy('id', 'DESC')->first();
        $invoice_no = '';
        if ($invoice == null)
        {
            $invoice_no = 'INV1';
        }else{
            $ex =  explode('INV', $invoice->invoice_no);
            $invoice_no = 'INV'.($ex[1] + 1);
        }

        $billing = Billing::create([
            'invoice_no' => $invoice_no,
            'challan_nos' => json_encode($request->challan_nos,true),
            'product_details' => json_encode($request->product_details,true),
            'customer_id' => $request->customer_id,
            'issue_date' => $request->issue_date,
            'total_discount' => $request->total_discount,
            'total_gst' => $request->total_gst,
            'grand_total' => $request->grand_total,
            'grand_total' => $request->grand_total,
        ]);
//        $payment = Payment::create([
//            'payment_type' => $request->payment_type,
//            'receive_amount' => $request->receive_amount,
//            'due_amount' => $request->grand_total - $request->receive_amount,
//            'invoice_id' => $billing->id,
//        ]);
        if (count($request->challan_nos) == 0){
            foreach ($request->product_details as $product)
            {
                $stock = Stock::where('product_id', $product['product_id'][0])->first();
                $stock->stock_out = $stock->stock_out + $product['quantity'];
                $stock->stock_available = $stock->stock_in - $stock->stock_out;
                $stock->update();
            }

        }

        return "success";
    }

    public function payment($id)
    {
        $invoice = Billing::find($id);
        $payments = Payment::where('invoice_id', $id)->get();
        $total_paid = 0;
        if (count($payments) > 0){
            foreach ($payments as $payment){
                $total_paid += $payment->receive_amount;
            }
        }

        $due = $invoice->grand_total - $total_paid;

        return view('admin.billings.payment', compact(['due','id']));
    }


    public function paymentStore(Request $request, $id)
    {
        $invoice = Billing::find($id);
        $payments = Payment::where('invoice_id', $id)->get();
        $total_paid = 0;
        if (count($payments) > 0){
            foreach ($payments as $payment){
                $total_paid += $payment->receive_amount;
            }
        }

        $due = $invoice->grand_total - $total_paid;

        if ($request->receive_amount <= $due){
            $payment = Payment::create([
                'payment_type' => $request->payment_type,
                'receive_amount' => $request->receive_amount,
                'due_amount' => 0,
                'invoice_id' => $id,
            ]);

            return redirect()->route('invoices.index')->with('success', 'Payment Created Successfully');
        }else{
            return redirect()->back()->with('error', "Entered Amount is gather than due");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Billing::find($id);
        $profile = Profile::find(1);
        $challans = challan::whereIn('id', json_decode($invoice->challan_nos,true))->get();
        return view('admin.billings.show', compact(['invoice', 'challans', 'profile']));
    }


    public function laser()
    {
        return "Coming Soon";
        $payments = Payment::with(['invoice' => function($q){
          $q->with('customer:id,full_name')->select('id','customer_id','grand_total')->get();
        }])->get();
//
//        $total_paid = 0;
//        foreach ($payments as $payment){
//            $total_paid += $payment->receive_amount;
//        }
////        $invoice->total_paid = $total_paid;
//
//        return view('admin.laser.index', compact('payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
