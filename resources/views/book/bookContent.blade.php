@extends('layout.default')
@section('title','Book')

@section('content')
    @include('layout._header')
    <div class="container">
        <div class="jumbotron">
            <h2>{{$book->title}}</h2>
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
