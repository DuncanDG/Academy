@extends('layouts.app', ['page'=>'Home','pageSlug' => 'home'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <hr>
                        <img class="avatar" src="{{ asset('img/default-avatar.png') }}" alt="">
                        <p>{{ __(auth()->user()->name) }}</p>
                        <a href="mailto:admin@black.com">{{auth()->user()->email}}</a>
                        <hr>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
