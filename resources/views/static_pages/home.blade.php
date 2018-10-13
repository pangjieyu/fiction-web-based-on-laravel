@extends('layout.default')
@section('link')
    <link rel="stylesheet" href="/searchStyle/style.css">
    <link rel="stylesheet" href="/searchStyle/normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style type="text/css">
        body {
            background-color: #f9f0da;
        }
    </style>
@stop
{{--@section('content')
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
@stop--}}
@section('content')
    @include('layout._header')
    <div id="content">

        <section class="intro">
            <h1></h1>
            <p style="text-align: center">
                搜寻你想要的。。。
            </p>
            <div class="search d3">
                <form action="{{route('find')}}" method="post">
                    {{ csrf_field() }}
                    <input type="text" placeholder="搜索从这里开始..." name="bookName">
                    <button type="submit"></button>
                </form>
            </div>
        </section>

{{--        <section class="row">
            <div class="col-full">
                <h2>Example title</h2>
                <p>
                    Gumba is a fictional agency from Amsterdam, The Netherlands. This is the place where you would normally introduce yourself. You can easily change the template to fit your needs by adding text or changing the colors and styles.
                </p>
            </div>
        </section>--}}



        <section class="row">
            <div class="col">
                <h2>Contact</h2>
                <p>
                    You can send me an email to pang.jie.yu@outlook.com
                </p>
            </div>
        </section>
        @include('layout._footer')

    </div>
@stop
