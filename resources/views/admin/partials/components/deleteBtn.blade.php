<form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post" class="inline">
    @csrf
    @method('DELETE')
    
    <input type="submit" value="cancella" class="btn btn-warning inline">
</form>