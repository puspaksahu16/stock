<?php

namespace App\Http\Controllers;


use App\colour;
use App\Product;
use App\brand;
use App\size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = brand::all();
        $size = size::all();
        $colour = colour::all();
        return view('admin.products.create',compact(['brand','size','colour']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'name.required' => 'Product Name is required.',
            'product_code.required' => 'Product code is required.',
        ];
        $validatedData = $request->validate([
            'name' => 'required',
            'product_code' => 'required',
        ], $messages);

        $product_code = Product::where('product_code', $request->product_code)->first();

        if (empty($product_code->id))
        {
            $data = $request->all();

            if($request->hasFile('image')) {
                $img = $request->file('image');
                $extension = $img->getClientOriginalExtension();
                $fileName = 'product'.date('his').rand().".".$extension;
                $img->move(public_path('images/product_image'), $fileName);
                $data['image'] = $fileName;
            }

            $product = Product::create($data);

            return redirect()->route('products.index')->with('success', 'Product created Successfully');
        }else{
            return redirect()->back()->with('error', 'HSN Code Already Exist');
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
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
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
        $product = Product::find($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->is_active = 0;
        $product->update();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
