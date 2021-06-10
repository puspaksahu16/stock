<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
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
            'full_name.required' => 'Full Name is required.',
            'email.required' => 'Email is required.',
            'mobile.required' => 'Mobile is required.',
            'concat_person_no.required' => 'Contact Person No is required.',
            'gst.required' => 'GST No is required.',
            'address.required' => 'Address is required.',
            'state.required' => 'State is required.',
            'zip.required' => 'Zip is required.',
            'country.required' => 'Country is required.'
        ];
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'concat_person_no' => 'required',
            'gst' => 'required',
            'address' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required'
        ], $messages);


        $customer = Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customers created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $customers = Customer::all();
        return view('admin.customers.show', compact('customers')    );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.edit', compact('customer'));
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
        $customer = Customer::find($id);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);$customer->is_active = 0;
        $customer->update();
        return redirect()->route('customers.index')->with('success', 'Customer Deleted Successfully');
    }
}
