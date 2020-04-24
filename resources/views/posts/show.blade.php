
@extends('layout.master')

@section('title', $slug->title)

@section('content')
    <div class="col-md-8 blog-main" >
        <h3 class="pb-3 mb-4 font italic border-bottom">
            {{ $slug->title }}
        </h3>
        <h4 class="pb-3 mb-4 font italic border-bottom">
            {{ $slug->created_at->toFormattedDateString() }}
        </h4>

        {{ $slug->body }}

    </div>
@endsection
