@extends('layouts.app')
@section('content')
{{-- @dump($post) --}}
<div class="container">
    <div class="text-center border border-primary rounded-left">
        <h2>TITLE: {{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p> autore: {{$post->user->name}} ({{$user->email}})</p>
    </div>
    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-light">modifica il tuo post</a><br>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-primary">ritorna indietro</a><br>
</div>
@endsection