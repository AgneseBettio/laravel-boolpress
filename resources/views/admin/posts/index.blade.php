@extends('layouts.public')
@section('content')

    @foreach($posts as $post) 
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->text}}</p>
        </div>
    </div>

    {{-- per eventuale form per commentare?? --}}
    <a href="#">commenta</a>
    @endforeach
@endsection

