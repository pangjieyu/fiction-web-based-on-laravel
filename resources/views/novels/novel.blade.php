{{--
@extends('layout.default')
@section('title', 'novel')
@section('content')
    @include('layout._header')
--}}
{{--    <main role="main" class="container">
        <div class="jumbotron">
            <h1> {{ $novel->chapterName }} </h1>
            {!! $novel-> chapterContent !!}
        </div>
    </main>--}}{{--


@stop--}}

        <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/Gumba/img/favicon.ico">
    <link rel="stylesheet" href="/Gumba/css/vendor/fluidbox.min.css">
    <link rel="stylesheet" href="/Gumba/css/main.css">

    <title>{{ $novel->chapterName }}</title>

</head>
<body>


<header>

    <div id="logo-container">
        <div id="logo"><a href="/">P-FICTION</a></div>
    </div>
     		<nav style="width: 98%;">
                <ul>
                    <li><a href="/">主页</a></li>
                    <li><a href="{{route('allBook')}}">所有书籍</a></li>
                    <li><a href="/book/{{$novel->book->bookId}}/chapterList">章节目录</a></li>
                    <li><a href="{{ route('users.show',Auth::user()->id) }}" class="bordered">个人中心</a></li>
                </ul>
            </nav>

</header>

<div id="content">

    <section class="intro">
        <h1 style="color: #e85151;">{{ $novel->chapterName }}<span class="nl"></span></h1>
        {!! $novel->chapterContent !!}
    </section>

{{--    <section class="row">
        <div class="col-full">
            <h2>Example title</h2>
            <p>
                Gumba is a fictional agency from Amsterdam, The Netherlands. This is the place where you would normally introduce yourself. You can easily change the template to fit your needs by adding text or changing the colors and styles.
            </p>
        </div>
    </section>--}}

    <!--<section class="row">
        <div class="photo-grid">
            <a href="img/example-photo-b.jpg" rel="lightbox" class="col-2"><img src="img/example-photo-b.jpg" alt="Example photo"></a>
            <a href="img/example-photo-c.jpg" rel="lightbox" class="col-2"><img src="img/example-photo-c.jpg" alt="Example photo"></a>
            <a href="img/example-photo-a.jpg" rel="lightbox" class="col-1"><img src="img/example-photo-a.jpg" alt="Example photo"></a>
        </div>
    </section>-->


    <section class="row">
        <div class="col">
            <h2>上一章节</h2>
            @if(count($last)!=0)
                <p>
                    <a href="{{ route('novel',$last->chapterId) }}">{{ $last->chapterName }}</a>
                </p>
            @else
                <p>
                    当前就是第一章
                </p>
            @endif
        </div>
        <div class="col">
            <h2>下一章节</h2>
            @if(count($next)!=0)
                <p>
                    <a href="{{ route('novel',$next->chapterId) }}">{{ $next->chapterName }}</a>
                </p>
            @else
                <p>
                    后面没有了哦
                </p>
            @endif
        </div>
    </section>


    <section class="row">
        <div class="col-full">
        </div>
    </section>
    @include('layout._footer')

</div>

<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.0.min.js"></script>
<script>
    if (!window.jQuery)
    {
        document.write('<script src="/Gumba/js/vendor/jquery.1.11.min.js"><\/script>');
    }
</script>

<script src="/Gumba/js/vendor/jquery.fluidbox.min.js"></script>
<script src="/Gumba/js/main.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'YOUR_GOOGLE_ANALYTICS_ID', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>

