<?php

namespace App\Http\Controllers;

use App\challan;
use App\Customer;
use App\Product;
use App\Profile;
use App\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quotation::all();
        return view('admin.quotations.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('is_active', 1)->get();
        $customers = Customer::where('is_active', 1)->get();
        $quote = Quotation::select("quote_no")->orderBy('id', 'DESC')->first();
        $quote_no = '';
        if ($quote == null)
        {
            $quote_no = 'QT1';
        }else{
            $ex =  explode('QT', $quote->quote_no);
            $quote_no = 'QT'.($ex[1] + 1);
        }
        return view('admin.quotations.create', compact(['products', 'quote_no', 'customers']));
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
        $quote = Quotation::select("quote_no")->orderBy('id', 'DESC')->first();
        $quote_no = '';
        if ($quote == null)
        {
            $quote_no = 'QT1';
        }else{
            $ex =  explode('QT', $quote->quote_no);
            $quote_no = 'QT'.($ex[1] + 1);
        }
        $data['quote_no'] = $quote_no;
        $data['product_details'] = json_encode($request->product_details,true);
        $quote = Quotation::create($data);
        return "success";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote = Quotation::find($id);
        $profile = Profile::find(1);
        return view('admin.quotations.show', compact(['quote', 'profile']));
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
