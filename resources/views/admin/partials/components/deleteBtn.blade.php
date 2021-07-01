<form action="{{ route('admin.posts.destroy', $posts->id) }}" method="post">
    @csrf
    @method('DELETE')

    <input type="submit" value="cancella">
</form>