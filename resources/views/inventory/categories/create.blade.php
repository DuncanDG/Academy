@extends('layouts.app', ['page'=>'Add category','pageSlug'=> 'categories', 'section'=>'inventory'])

@section('title','| Add Category')

@section('content')
 <div class="container-fluid mt-7">
 <div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">Add Category</h3>
            </div>
            <div class="col-4 text-right">
              <a href="{{route('categories.index')}}" class="btn btn-sm btn-primary">Back to list</a>
            </div>
          </div>
        </div> 
        <div class="card-body">
         <form action="{{route('categories.store')}}" method="POST" autocomplete="off">
           @csrf
           <h6 class="heading small text-muted mb-4">Category Information</h6>
           <div class="pl-lg-4">
               <div class="form-group">
                   <label for="input-name">Name</label>
                   <input type="text" name="name" id="input-name" class="form-control">
               </div>

               <div class="text-center">
                   <button type="submit" class="btn btn-primary">Save</button>
               </div>
           </div>
        </form>
        </div>   
      </div>   
 </div>
 </div>
@endsection