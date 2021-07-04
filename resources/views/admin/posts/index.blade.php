@extends('layouts.app')
@section('content')
    {{-- <div class="container">
        @foreach($posts as $post) 
        <div class="card text-center" style="width: rem;">
            <div class="card-body">
                <h5 class="card-title text-center">{{$post->title}}</h5>
                <p class="card-text">{{$post->text}}</p>
         
                <a href="{{ route('admin.posts.show', $post->id ) }}" class="badge badge-primary">espandi</a>
         
                @include('partials.components.deleteBtn', ["id"=>$post->id])
            </div>
        </div>             
        @endforeach
            
    </div> --}}
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Categoria</th>
                <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->category ? $post->category->name : '-'}}</td>
                        <td>
                            {{-- mostra post --}}
                            <a href="{{ route('admin.posts.show', $post->id ) }}" class="btn btn-info"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </a>
                            {{--modifica--}}
                            <a href="{{ route('admin.posts.edit', $post->id ) }}" class="btn btn-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg>
                            </a>
                            {{-- elimina post--}}
                            @include('admin.partials.components.deleteBtn', ["id"=>$post->id])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-primary">nuovo post</a>  
    </div>
@endsection

