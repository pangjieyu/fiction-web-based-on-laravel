<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="width: 100%">
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
                    <a class="nav-link" href="{{route('allBook')}}">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Contact</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <div class="dropdown">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->name }}</button>
                        <ul class="dropdown-menu pull-left" style="right:0; left:auto;">
                            <li>
                                <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">个人中心</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">编辑资料</a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" href="#">
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
                    </div>
                @else
                    <li><a class="nav-link" href="{{ route('signup') }}">注册</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>
