@extends('layouts.app', ['page' => 'Category Information', 'pageSlug'=>'categories', 'section'=>'inventory'])

@section('title','| Category')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h2>{{$category->name}}</h2>
                        </div>
                        <div class="col-4 text-right">
                             {{-- <a href="{{route('categories.index')}}" class="btn btn-primary btn-sm">Back to list</a> --}}
                             <a href="{{route('products.index')}}" class="btn btn-primary btn-sm">Back to list</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Products</th>
                            <th>Stocks</th>
                            <th>Defective stock</th>
                            <th>Average Price</th>  
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->products->count()}}</td>
                                <td>{{$category->products->sum('stock')}}</td>
                                <td>{{$category->products->sum('stock_defective')}}</td>
                                {{-- round off to the nearest integer --}}
                                <td>{{round($category->products->avg('price'))}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-muted">Products under this category</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>ID</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Defective Stock</th>
                            <th>Base price</th>
                            <th>Average Price</th>
                            <th>Total sales</th>
                            <th>Income Produced</th>
                            <th></th>  
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                                <tr>
                                    <td><a href="{{ route('products.show', $product) }}">{{ $product->id }}</a></td>
                                    <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->stock_defective }}</td>
                                    <td>{{ $product-> price }}</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="tim-icons icon-zoom-split"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>


@endsection