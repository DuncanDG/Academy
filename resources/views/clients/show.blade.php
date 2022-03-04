@extends('layouts.app', ['page' => 'Client Information', 'pageSlug' => 'clients', 'section' => 'clients'])

@section('content')
@include('alerts.error')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                <div class="col-8">
                    <h4 class="card-title">Client Information</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('clients.index')}}" class="btn btn-primary btn-sm">Back to list</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Document</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Balance</th>
                            <th>Purchases</th>
                            <th>Total Payment</th>
                            <th>Last purchase</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->document_type }}-{{ $client->document_id }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->email }}</td>
                                <td>
                                    @if ($client->balance > 0)
                                        <span class="text-success">{{$client->balance }}</span>
                                    @elseif ($client->balance < 0.00)
                                        <span class="text-danger">{{ $client->balance }}</span>
                                    @else
                                        {{ $client->balance }}
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection