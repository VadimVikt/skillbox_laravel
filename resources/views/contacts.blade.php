@extends('layout.master')
@section('title','Контакты')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Контакты
        </h3>
        @include('layout.errors')
        <form method="post" action="/admin/feedbacks">
            @csrf
            <div class="form-group">
                <label for="codePost">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email">
                <small id="emailHelp" class="form-text text-muted">Ваш емайл</small>

                <div class="form-group">
                    <label for="textarea">Введите ваши комментарии</label>
                    <textarea class="form-control" name="body" id="textarea" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Записать</button>
            </div>
        </form>
    </div>
@endsection
