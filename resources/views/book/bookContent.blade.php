@extends('layout.default')
@section('title','Book')

@section('content')
    @include('layout._header')
    <div class="container">
        <div class="jumbotron">
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
                                {{$chapter->chapterName}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop
