@extends('layout.master')
@section('title', 'Космический блог')
@section('content')
    <div class="jumbotron col-12 p-4 p-md-5 text-white rounded bg-dark">
        <h1 class="display-6 font-italic">Добро пожаловать в Космический блог</h1>
        <p class="lead my-3">
            Был этот мир глубокой тьмой окутан. <br>
            Да будет свет! И вот явился Ньютон. <br>
            <i>(Эпиграмма XVIII века)</i> <br>
            Но сатана не долго ждал реванша.<br>
            Пришел Эйнштейн и стало вcе как раньше.<br>
            <i>(Эпиграмма XX века)</i>
        </p>
    </div>

{{--@foreach($posts as $post)--}}
{{--    <div class="container">--}}
{{--        <div class="row mb-2">--}}
{{--            <div class="col-md-8 blog-main">--}}
{{--                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-150 position-relative">--}}
{{--                    <div class="col p-4 d-flex flex-column position-static">--}}
{{--                        <h3 class="mb-0">{{ $post->title }}</h3>--}}
{{--                        <div class="mb-1 text-muted">{{ $post->created_at->toFormattedDateString()  }}</div>--}}
{{--                        <p class="card-text mb-auto">{{ $post->short_description }}</p>--}}
{{--                        <a href="/posts/{{ $post->slug }}" class="stretched-link">Continue reading</a>--}}
{{--                    </div>--}}
{{--                    <div class="col-auto d-none d-lg-block">--}}
{{--                        <svg class="bd-placeholder-img" width="200" height="150" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endforeach--}}

    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Коротко обо всем
        </h3>
@foreach($posts as $post)
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString()  }}
{{--                <a href="#">Mark</a></p>--}}

            <p>{{ $post->short_description }}</p>
            @include('posts.tags', ['tags' => $post->tags])
{{--            <p class="">А слаг такой - {{ $post->slug }}</p>--}}
            <a href="/posts/{{ $post->slug }}" class="">Continue reading</a>
{{--    Этот класс ссылки не работает        class="stretched-link"--}}
            <hr>

        </div><!-- /.blog-post -->

@endforeach

{{--        <nav class="blog-pagination">--}}
{{--            <a class="btn btn-outline-primary" href="#">Older</a>--}}
{{--            <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>--}}
{{--        </nav>--}}

    </div><!-- /.blog-main -->



@endsection
