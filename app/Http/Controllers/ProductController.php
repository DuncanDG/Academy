<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
        //display all the products and the page
        $products = Product::orderBy('name')->paginate(10);

        return view('inventory.products.index')->withProducts($products);
    }

    public function printPdf(){

        $data = Product::all();

        dd($data);
        //share the data to the pdf view as products in the pdf view
        view()->share('products', $data);

        //take the design of the view to be printed (the view) and the data to be printed 
        //and conert it to PDF
        $pdf = PDF::loadview('inventory.products.productPDF_view', $data);

        //show the productPDF_view in in pdf browser
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get the categories data for the categories select option
        $categories = Category::all();
        //display a create product form
        return view('inventory.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the form 
        // $this->validate($request,[
        //    'name'     => 'required|max:255|min:2',
        //    'category' => 'required|integer',
        //    'description'=> 'required'
        // ]);

        //get the data from the form
        //'name', 'description', 'category_id', 'price', 'stock', 'stock_defective'
        // $product = Product::create($request->all());
        $product = new Product;
        $product ->name = $request->name;
        $product ->category_id = $request->category_id;
        $product ->price = $request->price;
        $product ->stock = $request->stock;
        $product ->stock_defective = $request->stock_defective;

        $product->save();
        
        return redirect()->route('products.index')->with('success','Product saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //display the product of the specific id
        $product = Product::find($id);

        // return view('inventory.products.show')->withProduct($product);
        return view('inventory.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //diplay the edit page
        $product = Product::find($id);
        $categories = Category::all();
        return view('inventory.products.edit')->withProduct($product)->withCategories($categories);
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
        //update the specific product
        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->route('products.index')->withStatus('Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete specific product
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('status', 'Product deleted successfully');
    }
}
