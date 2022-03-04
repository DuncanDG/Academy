@extends('layouts.app', ['page' => 'List of Categories', 'pageSlug' => 'users', 'section' => 'inventory'])

@section('title','| Categories')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <div class="row">
                       <div class="col-8">
                         <h4 class="card-title">Categories</h4>  
                       </div>
                       <div class="col-4 text-right">
                         <a href="{{route('categories.printpdf')}}" class="btn btn-sm btn-primary">print PDF</a>
                         <a href="{{route('categories.create')}}" class="btn btn-sm btn-primary">New Category</a>
                       </div>
                   </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table">
                            {{-- the scope=col specifies that the column is a header row for --}}
                            <thead class="thead-primary text-light">
                                <th scope="col">Name</th>
                                <th scope="col">products</th>
                                <th scope="col">Total Stock</th>
                                <th scope="col">Defective Stock</th>
                                <th scope="col">Average Price of Product</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                  <tr>
                                    <td>{{$category->name}}</td>
                                    {{-- count the number of products that are in this category --}}
                                    <td>{{count($category->products)}}</td> 
                                    {{-- we are adding all the stock in products that are in this category --}}
                                    {{-- stock is in products table  --}}
                                    <td>{{$category->products->sum('stock')}}</td> 
                                    {{-- add the number of defective stock in products in this category   --}}
                                    <td>{{$category->products->sum('stock_defective')}}</td>
                                    <td>{{$category->products->avg('price')}}</td>
                                    <td>
                                        <a href="{{route('categories.show', $category->id)}}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details"><i class="tim-icons icon-zoom-split"></i></a>
                                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Category"><i class="tim-icons icon-pencil"></i></a>
                                        <form action="{{route('categories.destroy', $category->id)}}" method="POST" class="d-inline">
                                           @csrf
                                           @method('DELETE')
                                           <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Category" onclick="confirm('Are you sure you want to delete this category? All products belonging to it will be deleted and the records that contain it will not be accurate.') ? this.parentElement.submit() : ''">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                        </form>
                                    </td>
                                  </tr>      
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection