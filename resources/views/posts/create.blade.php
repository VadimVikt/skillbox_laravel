@extends('layout.master')
@section('title','Добавить статью')
@section('content')

<div class="col-md-8 blog-main">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        Создание статьи
    </h3>
    @include('layout.errors')
    <form method="post" action="/posts">
        @csrf
        <div class="form-group">
            <label for="codePost">Код статьи</label>
            <input type="text" name="slug" class="form-control" id="codePost" aria-describedby="emailHelp" placeholder="ex: post-1_from_space">
            <small id="emailHelp" class="form-text text-muted">Символьный код - уникальное поле, только латинские буквы подчеркивание и тире.</small>
            <div class="form-group">
                <label for="titlePost">Название статьи</label>
                <input type="text" name="title" class="form-control" id="titlePost" aria-describedby="emailHelp" placeholder="Введите заголовок">
            </div>
            <div class="form-group">
                <label for="shortDescription">Краткое описание статьи</label>
                <input type="text" name="short_description" class="form-control" id="shortDescription" placeholder="Введите краткое описание статьи">
            </div>
            <div class="form-group">
                <label for="textarea">Введите текст статьи</label>
                <textarea class="form-control" name="body" id="textarea" rows="5"></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="publication" class="form-check-input" id="publicate">
                <label class="form-check-label" for="publicate">Опубликовано</label>
            </div>
            <button type="submit" class="btn btn-primary">Записать</button>
        </div>
    </form>
</div>
@endsection
