@extends('layouts.app')
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
            <label>Categoria</label>
                    <select name="category_id"
                            class="form-control  @error('category_id') is-invalid @enderror" >
                        <option value="">-- seleziona categoria --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id', '') ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            <input  class="btn btn-primary" type="submit" value="salva">
    
        </form>
        <div class="text-center">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-primary">torna alla home</a>    
        </div> 
    </div>
</div>
@endsection