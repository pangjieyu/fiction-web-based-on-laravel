@extends('layout.default')
@section('title','Book')

@section('content')
    @include('layout._header')
    <div class="container">
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
    </div>


@stop
