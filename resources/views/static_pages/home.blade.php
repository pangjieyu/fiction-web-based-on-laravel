@extends('layout.default')

@section('content')
    <div class="jumbotron">
        <h1>Hello world</h1>
        <p class="lead">
            你现在所看到的是庞界宇的主页。
        </p>
        <p>
            一切，将从这里开始。
        </p>
        <p>
            <a class="btn btn-lg btn-success" href="{{route('signup')}}" role="button">现在注册</a>
        </p>
    </div>
@stop