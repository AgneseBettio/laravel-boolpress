<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $data = [
            'posts' => Post::orderBy("created_at", "DESC")
                ->where("user_id", $request->user()->id)
                ->get()
        ];
        
        return view("admin.posts.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories
        ];
        return view('admin.posts.create', $data);
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Session $session)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => "nullable|exists:categories,id"
        ]);

        $formData = $request->all();
        $newPost = new Post();
        $newPost->fill($formData);
        $newPost->user_id = $request->user()->id;

        //genero lo slug da title
        $slug=Str::slug($newPost->title);
        $slugBase= $slug;
        //verifico disponibilità slug
        $postPresente = Post::where('slug', $slug)->first();
        $contatore = 1;
        //ciclo while per trovare corrispondenza
        while ($postPresente) {
            $slug = $slugBase . '-' . $contatore;
            $contatore++;
            $postPresente = Post::where('slug', $slug)->first();
        }
        //quando ese dal ciclo sicurezza slug unique
        $newPost->slug = $slug;

        $newPost->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = $post->user;    
        return view('admin.posts.show', [
            'post' => $post, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $categories = Category::all();

        $data = [
            'post'=> $post,
            'categories' => $categories
        ];
        return view('admin.posts.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $formData = $request->all();

        //verifico che titolo non sia cambiato
        if($formData['title'] != $post->title){
            $slug= Str::slug($formData['title']);
            $slugBase= $slug;
            //esiste in database precedente?
            $postPresente = Post::where('slug', $slug)->first();
            $contatore = 1;
            //ciclo while
            while($postPresente){
                $slug = $slugBase . '-' . $contatore;
                $contatore++;
                $postPresente = Post::where('slug', $slug)->first();
            }
            //quando esco da while sono sicuro che slug è unique
            $formData['slug'] = $slug;
        }
        $post->update($formData);
        
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}