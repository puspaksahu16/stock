<?php

namespace App\Http\Controllers;

use App\challan;
use App\Customer;
use App\Payment;
use App\Product;
use App\Profile;
use App\Stock;
use Illuminate\Http\Request;

class ChallanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challans = Challan::all();
        return view('admin.challans.index', compact(['challans']));
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
        $customers = Customer::where('is_active', 1)->get();
        $challan = challan::select("challan_no")->orderBy('id', 'DESC')->first();
        $challan_no = '';
        if ($challan == null)
        {
            $challan_no = 'CHN1';
        }else{
            $ex =  explode('CHN', $challan->challan_no);
            $challan_no = 'CHN'.($ex[1] + 1);
        }
        return view('admin.challans.create', compact(['products','customers', 'challan_no', 'available_products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeData(Request $request)
    {
        $data = $request->all();
        $challan = challan::select("challan_no")->orderBy('id', 'DESC')->first();
        $challan_no = '';
        if ($challan == null)
        {
            $challan_no = 'CHN1';
        }else{
            $ex =  explode('CHN', $challan->challan_no);
            $challan_no = 'CHN'.($ex[1] + 1);
        }
        $data['challan_no'] = $challan_no;
        $data['product_details'] = json_encode($request->product_details,true);
        $challan = Challan::create($data);
        foreach ($request->product_details as $product)
        {
            $stock = Stock::where('product_id', $product['product_id'][0])->first();
            $stock->stock_out = $stock->stock_out + $product['quantity'];
            $stock->stock_available = $stock->stock_in - $stock->stock_out;
            $stock->update();
        }


        return "success";
    }

    /**
     * Getting data from challan table for invoice
     * @param Request $request
     */
    public function getChallanDetails(Request $request)
    {
        $challan_nos = $request->challan_no;

        $challans = [];
        foreach ($challan_nos as $cn)
        {
            $challan = challan::find($cn);
            foreach (json_decode($challan->product_details, true) as $c)
            {
                array_push($challans,$c);
            }
        }


        return $challans;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $challan = challan::find($id);
        $profile = Profile::find(1);
        return view('admin.challans.show', compact(['challan', 'profile']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $challan = Challan::find($id);
        return view('admin.challans.edit', compact('challan'));
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
        $challan = Challan::find($id);
        $challan->update($request->all());
        return redirect()->route('challans.index')->with('success', 'Challan updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $challan = Challan::find($id);
        $challan->is_active = 0;
        $challan->update();
        return redirect()->route('challans.index')->with('success', 'Challan Deleted Successfully');
    }
}
