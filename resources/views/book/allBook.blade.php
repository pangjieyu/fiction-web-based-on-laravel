@extends('layout.default')
@section('title', 'Books')

@section('content')
    @include('layout._header')

    <div class="container">
        <div class="jumbotron">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
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
                            <td><img src="{{ $book->cover }}" width="100" height="100"></td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->bookIntroduction }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ $book->hits }}</td>
                            <td>
                                <button type="button" class="btn btn-primary">收藏</button>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>



        </div>
    </div>
@stop