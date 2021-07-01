@extends('layouts.public')
@section('content')
    <div class="container">
        @foreach($posts as $post) 
        <div class="card text-center" style="width: rem;">
            <div class="card-body">
                <h5 class="card-title text-center">{{$post->title}}</h5>
                <p class="card-text">{{$post->text}}</p>
                {{-- mostra post --}}
                <a href="{{ route('admin.posts.show', $post->id ) }}" class="badge badge-primary">espandi</a>
                {{-- elimina post--}}
                @include('partials.components.deleteBtn', ["id"=>$post->id])
            </div>
        </div>
        {{-- nuovo post --}}          
        @endforeach
        <a href="{{ route('admin.posts.create') }}" class="badge badge-primary">nuovo post</a>      
    </div>
@endsection

