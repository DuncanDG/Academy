@extends('layouts.app', ['pages'=>'Edit Category', 'pageSlug'=>'categories','section'=>'inventory'])

@section('title,| Edit Category')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4>Edit Category</h4>
                                </div>
                                <div class="col-4 text-right">
                                     <a href="{{route('categories.index')}}" class="btn btn-primary btn-sm">Back to list</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('categories.update', $category->id)}}" method="POST" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">Name</label>
                                    <input class="form-control" type="text" name="name" id="input-name" value="{{$category->name}}" placeholder="Category Name" required autofocus>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4" onclick="confirm('Are you sure you want to update this category ?') ? this.parentElement.submit() : ''">Update</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection