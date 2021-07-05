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
            <td>{{ $tags->id }}</td>
            <td>{{ $tags->name }}</td>
            <td>{{ $tags->slug }}</td>
            {{-- <td>{{ count($tags->posts) }}</td> --}}
          </tr>
          @endforeach
        </tbody>
    </table>
</div>

@endsection