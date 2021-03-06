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
            'price.required' => 'Price is required.',
            'model_no.required' => 'Model Number is required.',
            'brand_id.required' => 'Brand is required.',
            'size_id.required' => 'Size is required.',
            'image.required' => 'Image is required.',
            'colour_id.required' => 'Colour is required.',
            'hsn.required' => 'HSN is required.',
            'description.required' => 'Description is required.',
            'product_code.unique' => 'Product Code Already Exist.',
        ];
        $validatedData = $request->validate([
            'name' => 'required',
            'product_code' => 'required|unique:products',
            'price' => 'required',
            'model_no' => 'required',
            'brand_id' => 'required',
            'size_id' => 'required',
            'image' => 'required',
            'colour_id' => 'required',
            'hsn' => 'required',
            'description' => 'required'
        ], $messages);

//        $product_code = Product::where('product_code', $request->product_code)->first();

//        if (empty($product_code->id))
//        {
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
//        }else{
//            return redirect()->back()->with('error', 'Product Code Already Exist');
//        }
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

        $brand = brand::all();
        $size = size::all();
        $colour = colour::all();
        $product = Product::find($id);
        return view('admin.products.edit', compact(['product','brand','size','colour']));
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
        $brand = brand::all();
        $size = size::all();
        $colour = colour::all();
        $product = Product::find($id);
        $data = $request->all();
        if($request->hasFile('image')) {
            $img = $request->file('image');
            $extension = $img->getClientOriginalExtension();
            $fileName = 'product'.date('his').rand().".".$extension;
            $img->move(public_path('images/product_image'), $fileName);
            $data['image'] = $fileName;
        }

        $product->update($data);
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
        return redirect()->route('products.index')->with('success', 'Product Inactive Successfully');
    }
}
