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
        @foreach ($categories as $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td>{{ $category->name }}</td>
          <td>{{ $category->slug }}</td>
          <td>{{ count($category->posts) }}</td>
        </tr>
        @endforeach
      </tbody>
  </table>
</div>

@endsection