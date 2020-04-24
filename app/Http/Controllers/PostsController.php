<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $slug)
    {
        return view('posts.show', compact('slug'));
    }


    public function store()
    {
        $this->validate(request(), [
            'slug' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'body' => 'required',
        ]);

        Post::create(request()->all());

        return redirect('/posts');

    }
}
