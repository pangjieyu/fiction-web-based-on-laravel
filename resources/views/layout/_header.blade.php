<header>

    <div id="logo-container">
        <div id="logo"><a href="/">P-FICTION</a></div>
    </div>
    <nav style="width: 98%;">
        <ul>
            @if (Auth::check())
                <li><a href="/">主页</a></li>
                <li><a href="{{route('allBook')}}">所有书籍</a></li>
                <li><a href="{{ route('users.show',Auth::user()->id) }}" class="bordered">个人中心</a></li>
            @else
                <li><a href="{{route('allBook')}}">所有书籍</a></li>
                <li><a href="{{ route('signup') }}">注册</a></li>
                <li><a href="{{ route('login') }}">登录</a></li>
            @endif
        </ul>
    </nav>

</header>
