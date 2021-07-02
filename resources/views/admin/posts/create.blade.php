@extends('layouts.public')
@section('content')
<div class="container">
    <div class="form-group">
        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            {{-- titolo --}}
            <label for="title">titolo</label>
            <input type="text" name="title" id="title" class="form-control">
            {{-- contenuto --}}
            <label for="content">contenuto</label>
            <textarea type="text" name="content" id="content" class="form-control" rows="20"></textarea>

            <input  class="btn btn-primary" type="submit" value="salva">
    
        </form>
        <div class="text-center">
            <a href="{{ route('admin.posts.index') }}" class="badge badge-primary">torna alla home</a>    
        </div> 
    </div>
</div>
@endsection