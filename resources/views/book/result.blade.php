@extends('layout.default')
@section('title', 'Books')

@section('content')
    @include('layout._header')
    <div id="content">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <section class="row">
            <div class="col">
                <h2>封面</h2>
            </div>
            <div class="col">
                <h2>书名</h2>
            </div>
            <div class="col">
                <h2>简介</h2>
            </div>
            <div class="col">
                <h2>作者</h2>
            </div>
            <div class="col">
                <h2>收藏量</h2>
            </div>
            <div class="col">
                <h2>收藏</h2>
            </div>
        </section>
        @foreach($books as $book)
            <section class="row">
                <div class="col" style="position: relative;">
                    <a href="/book/{{$book->bookId}}/chapterList">
                        <img src="{{ $book->cover }}" width="100" height="100">
                    </a>
                </div>
                <div class="col" style="position: relative;">
                    <a href="/book/{{$book->bookId}}/chapterList">
                        <h5 style="position: absolute; top: 40%;">
                            {{ $book->title }}
                        </h5>
                    </a>
                </div>
                <div class="col" style="position: relative;">
                    <h5 style="position: absolute; top: 40%;">
                        {{ $book->bookIntroduction }}
                    </h5>
                </div>
                <div class="col" style="position: relative;">
                    <h5 style="position: absolute; top: 40%;">
                        {{ $book->author->name }}
                    </h5>
                </div>
                <div class="col" style="position: relative;">
                    <h5 style="position: absolute; top: 40%;">
                        {{ $book->hits }}
                    </h5>
                </div>
                <div class="col" style="position: relative;">
                    <h5 style="position: absolute; top: 40%;">
                        <a role="button" class="btn btn-primary" href="{{ route('addBook',$book->bookId) }}">I like it!</a>
                    </h5>
                </div>
            </section>
        @endforeach
        <section class="row">
            <div class="col-full"></div>
        </section>
        @include('layout._footer')

    </div>
@stop