@extends('layouts.app',['page'=>'Add Supplier', 'pageSlug'=>'suppliers', 'section' => 'Suppliers'])

@section('title','| Suppliers')

@section('content')
  <div class="container-fluid">
    <div class="row">
       <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col-8">
                          <h3>Add Supplier</h3>
                      </div>
                      <div class="col-4 text-right">
                           <a href="{{route('suppliers.index')}}" class="btn btn-sm btn-primary ">Back to list</a>
                      </div>
                    </div>
              </div>
              <div class="card-body">
                   <form class="" action="{{route('suppliers.store')}}" method="post">
                     @csrf
                     <h6 class="heading small text-muted mb-4">Suppliers Details</h6>
                     <div>
                       <div class="form-group {{ $errors->has('name') ? 'has-danger' : ''}}">
                        <label class="form-control-label" for="input-name">Name</label>
                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{$errors->has('name')?' is-invalid': ''}}" placeholder="Name" value="{{old('name')}}" required autofocus> 
                       </div>

                       <div class="form-group {{$errors->has('description') ? 'has-danger' : ''}}">
                        <label class="form-control-label" for="input-description">Description</label>
                        <input type="text" name="description" id="input-description" class="form-control form-control-alternative {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Description" value="{{old('description')}}" required>
                       </div>

                       <div class="form-group {{$errors->has('email') ? 'has-danger' : ''}}">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email" value="{{old('email')}}" required>
                       </div>

                       <div class="form-group {{$errors->has('telephone') ? 'has-danger' : ''}}">
                        <label class="form-control-label" for="input-telephone">Telephone</label>
                        <input type="phone" name="telephone" id="input-telephone" class="form-control form-control-alternative {{$errors->has('telephone') ? 'is-invalid' : ''}}" placeholder="Telephone" value="{{old('telephone')}}" required>
                       </div>

                       <div class="form-group {{$errors->has('paymentinfo') ? 'has-danger' : ''}}">
                        <label class="form-control-label" for="input-paymentinfo">Payment Information</label>
                        <textarea type="text" name="paymentinfo" id="input-paymentinfo" class="form-control form-control-alternative {{$errors->has('paymentinfo') ? 'is-invalid' : ''}}" placeholder="Payment Information" value="{{old('paymentinfo')}}" required></textarea>
                       </div>

                       <div class="text-center">
                         <button type="submit" class="btn btn-primary mt-4">Save</button>
                       </div>
                     </div>
                   </form>
              </div>
            </div>
       </div>
    </div>
  </div>
@endsection
