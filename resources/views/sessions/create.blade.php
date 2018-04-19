{{--
@extends('layout.default')
@section('title', '登录')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>登录</h5>
            </div>
            <div class="panel-body">
                @include('shared._errors')

                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email">邮箱：</label> <br>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <label> (<a href="{{ route('password.request') }}">忘记密码?</a>）</label><br>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" >
                    </div>

                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> 记住我</label>
                    </div>

                    <button type="submit" class="btn btn-primary">登录</button>
                </form>

                <hr>

                <p>还没账号？<a href="{{ route('signup') }}">现在注册！</a></p>
            </div>
        </div>
    </div>
@stop--}}

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登陆</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<div class="login-dark">

    @include('shared._errors')
    <form method="post" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="remember"> 记住我</label>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Log In</button>
        </div>
        <a href="{{ route('password.request') }}" class="forgot">Forgot your email or password?</a></form>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>