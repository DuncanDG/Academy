@extends('layouts.app', ['page'=>'Client', 'pageSlug'=>'Clients','section'=>'clients'])

@section('title', '| Clients')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                    <div class="col-8">
                        <h3>Clients</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('clients.create')}}" class="btn btn-primary btn-sm">Add Client</a>
                        {{-- <a href="{{route('clients.restore')}}" class="btn btn-primary btn-sm">Restore</a> --}}
                    </div>
                    </div>
                </div>
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th>Name</th>
                            <th>Document</th>
                            <th>Email / Telephone</th>
                            <th>Balance</th>
                            <th>Purchases</th>
                            <th>Total Payment</th>
                            <th>Last purchase</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->document_type}}<hr>{{$client->document_id}}</td>
                                    <td><a href="mailto:{{$client->email}}">{{$client->email}}</a><hr>{{$client->phone}}</td>
                                    <td>@if (round($client->balance) > 0)
                                        <span class="text-success">{{$client->balance}}</span>
                                        @elseif(round($client->balance) < 0)
                                        <span class="text-danger">{{$client->balance}}}</span>
                                        @else
                                        {{$client->balance}}
                                    @endif</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>
                                        <a href="{{route('clients.show', $client->id)}}" class="btn btn-link"  data-toggle='tooltip' data-placement="bottom" title="Client Details"><i class="tim-icons icon-zoom-split"></i></a>
                                        <a href="{{route('clients.edit', $client->id)}}" class="btn btn-link"  data-toggle='tooltip' data-placement="bottom" title="Edit Client"><i class="tim-icons icon-pencil"></i></a>
                                        <form action="{{route('clients.destroy', $client->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Client" onclick="confirm('Are you sure you want to delete this client ? The records will still exist.') ? this.parentElement.submit() :''"><i class="tim-icons icon-simple-remove"></i></button>
                                            {{-- <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="confirm('Are you sure you want to remove this client ? The records will still exist.') ? this.parentElement.submit(): ''"><i class="tim-icons icon-simple-remove"></i></button>    --}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
