@extends('layouts.public')
@section('content')
{{-- @dump($post) --}}
<div class="container">
    <div class="text-center border border-primary rounded-left">
        <h2>TITLE: {{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>autore: {{ $post->user->name}} </p>
    </div>
    <a href="{{ route('posts.index') }}" class="badge badge-primary">ritorna alla home</a><br>
</div>
@endsection