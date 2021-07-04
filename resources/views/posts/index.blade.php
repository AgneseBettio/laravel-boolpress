@extends('layouts.public')
@section('content')
    <div class="container">
        @foreach($posts as $post) 
        <div class="card text-center" style="width: rem;">
            <div class="card-body">
                <h5 class="card-title text-center">{{$post->title}}</h5>
                <p class="card-text">{{ substr($post->content, 0, 100) }}</p>
                <p class="card-text"> ultimo aggiornamento {{ $post->updated_at }}</p>
                {{-- mostra post --}}
                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="badge badge-primary">espandi</a>
            </div>
        </div>          
        @endforeach 
    </div>
@endsection