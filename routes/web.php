<?php

use App\Post;
use App\Feedbacks;

Route::get('/', function () {
    $posts = Post::Latest()->get(['id','title', 'short_description', 'created_at']);
    return view('welcome', compact( 'posts'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/posts', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/contacts', 'FeedbacksController@index');

Route::post('/admin/feedbacks', 'FeedbacksController@store');

Route::get('/admin/feedbacks', 'FeedbacksController@show');

