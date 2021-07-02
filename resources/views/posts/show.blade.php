@extends('layouts.public')
@section('content')
{{-- @dump($post) --}}
<div class="container">
    <div class="text-center border border-primary rounded-left">
        <h2>TITLE: {{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
    </div>
    <a href="{{ route('admin.posts.index') }}" class="badge badge-primary">ritorna alla home</a><br>
</div>
@endsection