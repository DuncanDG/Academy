<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the categories from db and display them
        $categories = Category::all();

        //display
        return view('inventory.categories.index')->withCategories($categories);
    }

    //print all the categories in pdf 
    public function printPdf(){

        //get all the categories to be printed into pdf
        $pdfdata = Category::get();

        //share the categories to the view
        view()->share('categories', $pdfdata);

        //get the view and the data to be printed and convert them to pdf format
        $pdf = PDF::LoadView('inventory.categories.pdf', $pdfdata);
        
        //return the pdf format /pdf page
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //diplay the create category view
        return view('inventory.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get the data to be stored and store them to the db
        //validate the field first
        $this->validate($request,[
          'name'=>  'required'
        ]);

        //get the request
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('status','Category Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //display the details of the item
        $categories = Category::find($id);
        $products = Product::where('category_id',$categories->id);

        return view('inventory.categories.show')->withCategory($categories)->withProduct($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //display the categories edit page
        $category = Category::find($id);
        return view('inventory.categories.edit')->withCategory($category);
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
        //save the request
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        $request->session()->flash('status', 'Category Updated successfully');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the category by id number
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index')->with('status','Category Deleted successfully');

    }
}
