@extends('layouts.app', ['page' => 'List of Products', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="col-4 text-right">
                            {{-- <a href="{{ URL::to('/products/pdf') }}" class="btn btn-sm btn-primary">printPdf</a> --}}
                            <a href="{{ route('products.printPdf')}}" class="btn btn-sm btn-primary">print PDF</a>
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter" id="">
                            <tr class="table-primary">
                            <thead class="thead-primary text-primary">
                                <th scope="col">Category</th>
                                <th scope="col">Product</th>
                                <th scope="col">Base Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Faulty</th>
                                <th scope="col">Total Sold</th>
                                <th scope="col"></th>
                            </thead>
                            </tr>
                            <tbody>
                               @foreach ($products as $product)
                                   <tr>
                                       <td><a href="{{ route('categories.show', $product->Category->id) }}">{{ $product->category->name }}</a></td>
                                       <td>{{$product->name}}</td>
                                       <td>$ {{$product->price}}</td>
                                       <td>{{$product->stock}}</td>
                                       <td>{{$product->stock_defective}}</td>
                                       <td>#</td>
                                       <td class="td-actions ">
                                        <a href="{{ route('products.show', $product) }}"  class="btn btn-link"  data-toggle="tooltip" data-placement="bottom" title="More Details"><i class="tim-icons icon-zoom-split"></i></a>
                                        <a href="{{route('products.edit', $product->id)}}"  class="btn btn-link"  data-toggle="tooltip" data-placement="bottom" title="Edit Product"><i class="tim-icons icon-pencil"></i></a>
                                        <form action="{{route('products.destroy', $product->id)}}" method="POST" class="d-inline">
                                           @csrf    
                                           @method('DELETE')
                                           <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="confirm('Are you sure you want to remove this product ? The records will still exist.') ? this.parentElement.submit(): ''"><i class="tim-icons icon-simple-remove"></i></button>
                                           {{-- <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                            <i class="tim-icons icon-simple-remove"></i>
                                          </button>  --}}
                                        </form>   
                                    </td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
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
