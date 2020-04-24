@extends('layout.master')
@section('title', 'Обратная связь')
@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Обратная связь
        </h3>

        <div class="row">
            <div class="col-3 pb-3 border-bottom">Email</div>
            <div class="col pb-3 border-bottom ">Обращение</div>
            <div class="col-3 pb-3 border-bottom">Дата получения</div>
        </div>
        @foreach($feeds as $feed)
            <div class="row">
                <div class="col-3 pb-2 pt-2 border-bottom">{{ $feed->email }}</div>
                <div class="col pb-2 pt-2 border-bottom ">{{ $feed->body }}</div>
                <div class="col-3 pb-2 pt-2 border-bottom">{{$feed->created_at}}</div>
            </div>
        @endforeach
    </div>

@endsection
