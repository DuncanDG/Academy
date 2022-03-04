@extends('layouts.app',['page'=>'Suppliers','pageSlug'=>'Suppliers ', 'section'=>'Suppliers'])

@section('title','- Suppliers')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-8">
                    <h4 class="card-title">Supplier Information</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('suppliers.index')}}" class="btn btn-sm btn-primary">Back to list</a>
                </div>
            </div>
        </div>
        <hr>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Payment information</th>
                        <th>Payments Made</th>
                        <th>Total Payment</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $supplier->id }}</td>
                            <td>{{ $supplier->description }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td style="max-width: 175px">{{ $supplier->paymentinfo }}</td>
                            <td>#</td>
                            {{-- <td>{{ abs($supplier->transactions->sum('amount')) }}</td> --}}
                            <td>#</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection