@extends('layout.default')
@section('title', 'novel')
@section('content')
    @include('layout._header')
    <main role="main" class="container">
        <div class="jumbotron">
            <h1> {{ $novel->chapterName }} </h1>
            {!! $novel-> chapterContent !!}
        </div>
    </main>

@stop