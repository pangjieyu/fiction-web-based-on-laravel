@extends('layout.default')
@section('title','Book')

@section('content')
    @include('layout._header')
    <div id="content">
        <section class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-full">
                <div class="row">

                    <div class="col-md-10">
                        <h1>{{$book->title}}</h1>
                    </div>
                    @if($book->authorId == Auth::user()->id)
                        <div class="col-md-2"><a href="{{route('write',$book->bookId)}}" class="btn btn-danger" role="button">添加章节</a></div>
                    @endif
                </div>
            </div>
            <div class="col">
                <h2 style="text-align: center;">章节名称</h2>
            </div>
                @if($book->authorId == Auth::user()->id)
                    <div class="col">
                        <h2 style="text-align: center;">操作</h2>
                    </div>
                @endif
        </section>
        @foreach($bookContent as $chapter)
            <section class="row">
                <div class="col">
                    <a  href="{{ route('novel',$chapter->chapterId) }}">
                        <h5 style="text-align: center;">
                            {{$chapter->chapterName}}
                        </h5>
                    </a>
                </div>
                @if($book->authorId == Auth::user()->id)
                    <div class="col">
                        <form action="{{ route('bookContent.destroy',['bookId'=>$book->bookId,'chapterId'=>$chapter->chapterId]) }}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-sm btn-danger delete-btn" style="float: right;">删除</button>
                        </form>
{{--                        <form action="{{ route('bookContent.edit',['bookId'=>$book->bookId,'chapterId'=>$chapter->chapterId]) }}" method="GET">
                            <button type="submit" class="btn btn-sm btn-primary" style="float: right;">编辑</button>
                        </form>--}}
                        <a href="{{ route('bookContent.edit',['bookId'=>$book->bookId,'chapterId'=>$chapter->chapterId]) }}">编辑</a>
                    </div>
                @endif
            </section>
        @endforeach
        @include('layout._footer')
    </div>
    {{--    <div class="container">
            <div class="jumbotron">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-8">
                        <h2>{{$book->title}}</h2>
                    </div>
                    @if($book->authorId == Auth::user()->id)
                        <div class="col-md-4"><a href="{{route('write',$book->bookId)}}" class="btn btn-primary" role="button">添加章节</a></div>
                    @endif
                </div>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <thread>
                            <tr>
                                <th>Chapter Name</th>
                            </tr>
                        </thread>

                        <tbody>
                        @foreach($bookContent as $chapter)
                            <tr>
                                <td>
                                    <a href="{{ route('novel',$chapter->chapterId) }}">
                                        {{$chapter->chapterName}}
                                    </a>
                                    @if($book->authorId == Auth::user()->id)
                                        <form action="{{ route('bookContent.destroy',['bookId'=>$book->bookId,'chapterId'=>$chapter->chapterId]) }}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-sm btn-danger delete-btn" style="float: right;">删除</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>--}}


@stop
