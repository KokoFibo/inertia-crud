<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Customer;
 use Illuminate\Http\Request;




class CustomerController extends Controller
{
    
    

    
    public function create()
    {
        return Inertia::render('Customer/Create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required'],
            'email' => ['required', 'email']
        ]);

        Customer::create([

            'nama' => $request->nama,
            'email' => $request->email

        ]);

        //redirect
        //return redirect()->route('customer.index');
         return redirect()->route('customer.index')->with('message', 'Data created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        return Inertia::render('Customer/Edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nama' => ['required'],
            'email' => ['required', 'email']
        ]);
        $customer = Customer::find($id);
        $customer->nama = $request->nama;
        $customer->email = $request->email;
        $customer->save();
        
        return redirect()->route('customer.index')->with('message', 'Data Updated succesfully');

        // return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('message', 'Data Deleted succesfully');

    }
}
