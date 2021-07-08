@extends('layouts.app')

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

                    {{ __('Benvenuto utente registrato ' . Auth::user()->name . ' !') }}
                </div>
                <div class="card-body">
                <ul>
                    <li>nome: {{ Auth::user()->name}} </li>
                    <li>email: {{ Auth::user()->email}} </li>
                    <li>indirizzo: {{Auth::user()->detail->address}} - {{Auth::user()->detail->zip}} </li>
                    <li>data di nascita: {{Auth::user()->detail->birthDate}} </li>
                    <li>nazione: {{Auth::user()->detail->birthCountry}} </li>
                </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection