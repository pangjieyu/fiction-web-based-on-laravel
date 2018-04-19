<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'HOME')-PFICTION</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
{{--<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">P-FICTION</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Contact</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('users.show', Auth::user()->id) }}">个人中心</a></li>
                            <li><a href="{{ route('users.edit', Auth::user()->id) }}">编辑资料</a></li>
                            <li role="separator" class="divider"></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a id="logout" href="#">
                                    <form action="{{ route('logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-block btn-danger" type="submit" name="button">
                                            退出
                                        </button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a class="nav-link" href="{{ route('help') }}">帮助</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>--}}
@yield('content')
{{--@include('layout._header')--}}

{{--
<div class="container">
    <div class="col-md-offset-1 col-md-10">
        @include('shared._messages')
        @yield('content')
        @include('layout._footer')
    </div>
</div>
--}}

<script src="/js/app.js"></script>
</body>
</html>