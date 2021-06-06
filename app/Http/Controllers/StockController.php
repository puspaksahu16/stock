<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('admin.stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.stocks.create', compact(['products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = Stock::where('product_id', $request->product_id)->first();
        if (!empty($stock)){
            $stock->last_added = $request->stock_in;
            $stock->stock_in = $stock->stock_in + $request->stock_in;
            $stock->stock_available = $stock->stock_in - $stock->stock_out;
            $stock->update();
        }else{
            $new_stock = new Stock();
            $new_stock->last_added = $request->stock_in;
            $new_stock->stock_in = $request->stock_in;
            $new_stock->stock_available = $request->stock_in;
            $new_stock->product_id = $request->product_id;
            $new_stock->save();
        }
        return redirect()->route('stocks.index')->with('success', 'Stock Updated Successfully');
    }


    /**
     * Delete Last Stock Entry
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $stock = Stock::find($id);
        $stock->stock_in = $stock->stock_in - $stock->last_added;
        $stock->stock_available = $stock->stock_in - $stock->stock_out;
        $stock->last_added = 0;
        $stock->update();
        return redirect()->route('stocks.index')->with('success', 'Last Entry Deleted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
