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
            @if(count($books)>0)
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
                        <h2>类型</h2>
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
                                {{ $book->typeName }}
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
            @else
                <section class="intro">
                    <h1>很抱歉， <span class="nl"></span>没有你要找的结果哦</h1>
                    <p>
                        找找别的或者自己<a href="{{route('newBook')}}">写一本</a>吧!
                    </p>
                </section>
            @endif
            <section class="row">
                <div class="col-full"></div>
            </section>
            @include('layout._footer')

    </div>
    {{--    <div id="content">
            <section class="row">
                <div class="col-full" style="width: 100%">
                    <div style="width: 80%; margin-left: auto; margin-right: auto;">
                        <table class="table table-hover table-sm">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <thead>
                            <tr>
                                <th>Cover</th>
                                <th>BookName</th>
                                <th>Introduction</th>
                                <th>Author</th>
                                <th>hits</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>
                                        <a href="/book/{{$book->bookId}}/chapterList">
                                            <img src="{{ $book->cover }}" width="100" height="100">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/book/{{$book->bookId}}/chapterList">
                                            {{ $book->title }}
                                        </a>
                                    </td>
                                    <td>{{ $book->bookIntroduction }}</td>
                                    <td>{{ $book->author->name }}</td>
                                    <td>{{ $book->hits }}</td>
                                    <td>
                                        <a role="button" class="btn btn-primary" href="{{ route('addBook',$book->bookId) }}">收藏</a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>
        </div>--}}
    {{--    <div class="container">
            <div class="jumbotron">
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <thead>
                        <tr>
                            <th>Cover</th>
                            <th>BookName</th>
                            <th>Introduction</th>
                            <th>Author</th>
                            <th>hits</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                                <tr>
                                    <td>
                                        <a href="/book/{{$book->bookId}}/chapterList">
                                            <img src="{{ $book->cover }}" width="100" height="100">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/book/{{$book->bookId}}/chapterList">
                                            {{ $book->title }}
                                        </a>
                                    </td>
                                    <td>{{ $book->bookIntroduction }}</td>
                                    <td>{{ $book->author->name }}</td>
                                    <td>{{ $book->hits }}</td>
                                    <td>
                                        <a role="button" class="btn btn-primary" href="{{ route('addBook',$book->bookId) }}">收藏</a>
                                    </td>
                                </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>--}}
@stop