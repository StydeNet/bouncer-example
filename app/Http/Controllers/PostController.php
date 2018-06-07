<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        auth()->user()->posts()->create($request->all());

        return redirect()->action('PostController@index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
