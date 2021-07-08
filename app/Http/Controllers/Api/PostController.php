<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        //recupero tutti post
        // $posts = Post::all();
        //recupero anche dati altre cartelle
        $posts = Post::with("tagas")->with("categories")->get();
        //ritrona array di oggetti - aggiungo array con key=>value
        return response()->json([
            "success" => true,
            "results" => $posts
          ]);
    }
}
