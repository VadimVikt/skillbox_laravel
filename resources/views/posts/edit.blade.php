@extends('layout.master')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Редактирование статьи
        </h3>
        @include('layout.errors')
        <form method="POST" action="/posts/{{ $post->slug }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="inputSlug">Символьный код</label>
                <input type="text" class="form-control" id="inputTitle"
                       placeholder="Введите символьный код (только латинские символы) статьи"
                       name="slug"
                       value="{{ old('title', $post->slug) }}">
            </div>
            <div class="form-group">
                <label for="inputTitle">Название статьи</label>
                <input type="text" class="form-control" id="inputTitle"
                       placeholder="Введите название статьи"
                       name="title"
                       value="{{ old('title', $post->title) }}">
            </div>
            <div class="form-group">
                <label for="inputShortDesc">Краткое содержание</label>
                <input type="text" class="form-control" id="inputShortDesc"
                       placeholder="Введите краткое описание статьи"
                       name="short_description"
                       value="{{ old('short_description', $post->short_description) }}">
            </div>
            <div class="form-group">
                <label for="inputBody">Содержание статьи</label>
                <textarea name="body" class="form-control" id="inputBody" rows="15" > {{ old('body', $post->body) }} </textarea>
            </div>
            <div class="form-group">
                <label for="inputTags">Теги</label>
                <input name="tags"
                       type="text"
                       class="form-control"
                       id="inputTags"
                       value="{{ old('tags', $post->tags->pluck('name'))->implode(',') }}"
                >
            </div>

            <button type="submit" class="btn btn-primary">Записать изменения</button>
        </form>
        <form method="POST" action="/posts/{{ $post->slug }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить статью</button>

        </form>
    </div>


@endsection
