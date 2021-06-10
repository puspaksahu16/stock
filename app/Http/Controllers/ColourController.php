<?php

namespace App\Http\Controllers;

use App\colour;
use Illuminate\Http\Request;

class ColourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colours = colour::all();
        return view('admin.colours.index',compact('colours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'product_colour.required' => 'Product Colour is required.',
        ];
        $validatedData = $request->validate([
            'product_colour' => 'required',
            ], $message
        );

        $colour = Colour::create($request->all());
        return redirect()->route('colours.index')->with('success', 'Colour created Successfully');
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
        $colour = Colour::find($id);
        return view('admin.colours.edit', compact('colour'));
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
        $colour = Colour::find($id);
        $colour->update($request->all());
        return redirect()->route('colours.index')->with('success', 'Colour updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colour = Colour::find($id);$colour->is_active = 0;
        $colour->update();
        return redirect()->route('colours.index')->with('success', 'Colour Deleted Successfully');
    }
}
