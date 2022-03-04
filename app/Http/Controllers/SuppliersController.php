<?php

namespace App\Http\Controllers;

use App\Models\igration;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show the index page with all the suppliers
        $suppliers = Supplier::paginate(10);
        
        return view('suppliers.index')->withSuppliers($suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show the create/add supplier page
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create a new supplier
        //validate the user input 
        $this->validate($request,[
            'name'         => 'max:255|min:2',
            'description'  => 'max:255|min:10',
            'phone'        => 'integer'
        ]);

        $supplier = new Supplier;
        $supplier -> name = $request -> name;
        $supplier -> description = $request -> description;
        $supplier -> email = $request -> email;
        $supplier -> phone = $request -> phone;
        $supplier -> paymentinfo = $request -> paymentinfo;

        $supplier->save();
        
        return redirect()->route('suppliers.index');
        $request->session()->flash('success', 'Supplier saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\igration  $igration
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show details of the selected supplier
        $supplier = Supplier::find($id);
        return view('suppliers.show')->withSupplier($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *  
     * @param  \App\Models\igration  $igration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //show the edit page with the details of a specific supplier
        //get the supplier info from the DB
        $supplier = Supplier::find($id);
        return view('suppliers.edit')->withSupplier($supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\igration  $igration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, igration $igration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\igration  $igration
     * @return \Illuminate\Http\Response
     */
    public function destroy(igration $igration)
    {
        //
    }
}
