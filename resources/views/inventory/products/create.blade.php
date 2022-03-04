@extends('layouts.app',['page'=> 'Add Product', 'pageSlug'=>'products', 'section'=>'inventory'])

@section('title','| Add Product')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Add product</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('products.index')}}" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.store')}}" method="POST">
                        @csrf
                        <h6 class="text-muted mb-4">Product Information</h6>
                        <div class="">
                            <div class="form-group">
                                <label class="form-control-label" for="input-name">Name</label>
                                <input type="text" name="name" id="input-name" class="form-control" placeholder="Name" required>
                             </div>
                             <div class="form-group">
                                 <label for="form-control-label" for="input-name" >Category</label>
                                 <select name="category_id" id="input-category" class='form-control'>
                                    @foreach ($categories as $category)
                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                             </div>
                             <div class="">
                                <label for="input-description" class="form-control-label">Description</label>
                                <input type="text" name="description" id="input-description" class="form-control" placeholder="description" required> 
                             </div>
                             <div class="row">
                                 <div class="col-4">
                                    <label for="input-stock" class="form-control-label">Stock</label>
                                    <input type="text" name="stock" id="input-stock" class="form-control" placeholder="stock" required> 
                                 </div>
                                 <div class="col-4">
                                     <label for="input-stock-defective" class="form-control-label">Defective Stock</label>
                                     <input type="number" name="stock_defective" id="input-stock-defective" class="form-control" placeholder="Defective stock" required>
                                 </div>
                                 <div class="col-4">
                                    <label for="input-price" class="form-control-label">Price</label>
                                    <input type="number" step="0.1" name="price" id="input-price" class="form-control" placeholder="price" required>
                                 </div>
                             </div>
                             <div class="text-center">
                                 <button class="btn btn-primary" type="submit">Save</button>
                             </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection