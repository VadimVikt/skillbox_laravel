
@extends('layout.master')

@section('title', $post->title)

@section('content')
    <div class="col-md-8 blog-main" >
        <h3 class="pb-3 mb-4 font italic border-bottom">
            {{ $post->title }}

        </h3>
        @can('update', $post)
        <a href="/posts/{{ $post->slug }}/edit">Редактировать статью</a>
        @endcan
        <h4 class="pb-3 mb-4 font italic border-bottom">
            {{ $post->created_at->toFormattedDateString() }}
        </h4>
        @include('posts.tags', ['tags' => $post->tags])
        {{ $post->body }}

    </div>
@endsection
