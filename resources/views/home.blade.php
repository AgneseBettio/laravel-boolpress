@extends('layouts.public')

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
                    @auth
                    {{ __('You are logged in!') }}
                    @else
                    <div class="text-center">
                        <a class="display-4"  href="{{ route("posts.index") }}">Vai ai post publici</a>

                    @endauth
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
