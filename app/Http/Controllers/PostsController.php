<?php

namespace App\Http\Controllers;

use App\Notifications\PostDeleted;
use App\Notifications\PostUpdated;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('can:update, post')->except(['index', 'store', 'create']); #НЕ РАБОТАЕТ
    }

    public function index()
    {
//        $posts = Post::where('owner_id', auth()->id())->with('tags')->latest()->get();
        $posts = auth()->user()->posts()->with('tags')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'slug' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'body' => 'required'
        ]);
        $attributes['owner_id'] = auth()->id();
        $post = Post::create($attributes);

//        event(new PostCreated($post));

        flash('Статья успешно добавлена');

        return redirect('/posts');

    }

    public function edit(Post $post)
    {


//        $this->authorize('update', 'post'); #НЕ РАБОТАЕТ
//        abort_if($post->owner_id !== auth()->id(), 403); #РАБОТАЕТ, но когда а AuthServiceProvider вводми проверку на админа выдает 403 ошибку
        abort_if(\Gate::denies('update', $post), 403); #Работает

        return view('/posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'slug' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'body' => 'required'
        ]);

        $post->update($attributes);

        $post->owner->notify(new PostUpdated($post));

        /** @var Collection $taskTags */
        $postTags = $post->tags->keyBy('name');

        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) {return $item; });

        $tagsToAttach = $tags->diffKeys($postTags);
        $tagsToDetach = $postTags->diffKeys($tags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($tag);
        }
        foreach ($tagsToDetach as $tag) {
            $post->tags()->detach($tag);
        }
        flash('Статья успешно обновлена', 'alert alert-primary');
        return redirect('/posts');
    }

    public function destroy(Post $post)
    {

        $post->owner->notify(new PostDeleted($post));

        $post->delete();

        flash('Статья удалена', 'danger');

        return redirect('/posts');
    }
}

