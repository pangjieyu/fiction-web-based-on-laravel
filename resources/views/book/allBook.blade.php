@extends('layout.default')
@section('title', 'Books')

@section('content')
    @include('layout._header')
    <div id="content">
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
    </div>
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