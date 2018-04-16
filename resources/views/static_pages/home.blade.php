@extends('layout.default')

@section('content')
    <div class="jumbotron">
        <h1>P-FICTION</h1>
        <p class="lead">
            P-Fiction——为所有用户服务的小说站
        </p>
        <p>
            一切，将从这里开始。
        </p>
        <p>
            <a class="btn btn-lg btn-success" href="{{route('signup')}}" role="button">现在注册</a>
        </p>
    </div>
@stop