@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Slug</th>
            <th>Count posti</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
          <tr>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->slug }}</td>
            <td>{{ count($tag->posts) }}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>

@endsection