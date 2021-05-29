<?php

namespace App\Http\Controllers;

use App\challan;
use App\Product;
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
        $products = Product::all();
        return view('admin.challans.create', compact(['products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $challan = Challan::create($request->all());
        return redirect()->route('challans.index')->with('success', 'Challan created Successfully');
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
