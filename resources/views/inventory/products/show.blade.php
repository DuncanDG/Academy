@extends('layouts.app', ['pages'=>'Product Information', 'pageSlug'=>'products', 'section'=>'inventory'])

@section('title')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Product Information</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Defective Stock</th>
                            <th>Base price</th>
                            <th>Average Price</th>
                            <th>Total sales</th>
                            <th>Income Produced</th>
                        </thead>
                        <tbody>
                               <tr>
                                <td>{{ $product->id }}</td>
                                <td><a href="{{ route('categories.show', $product->category) }}">{{ $product->category->name }}</a></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->stock_defective }}</td>
                                <td>$ {{ $product->price }}</td>
                                <td>#</td>
                                <td>#</td> 
                                <td>#</td>
                              </tr>
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@endsection