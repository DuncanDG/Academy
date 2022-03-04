@extends('layouts.app',['page'=>'Suppliers','pageSlug'=>'Suppliers ', 'section'=>'Suppliers'])

@section('title','- Suppliers')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">suppliers</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('suppliers.create') }}" class="btn btn-sm btn-primary">New supplier</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                @include('alerts.success')

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Payments Made</th>
                            <th scope="col">Total Payment</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->description }}</td>

                                    <td>
                                        <a href="mailto:{{ $supplier->email }}">{{ $supplier->email }}</a>
                                    </td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ route('suppliers.show', $supplier) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="tim-icons icon-zoom-split"></i>
                                        </a>
                                        <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit supplier">
                                            <i class="tim-icons icon-pencil"></i>
                                        </a>
                                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete supplier" onclick="confirm('Are you sure you want to delete this supplier? Records of payments made to him will not be deleted.') ? this.parentElement.submit() : ''">
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
