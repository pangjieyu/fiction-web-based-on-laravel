<li class="media">
    <div class="media-left">
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
    </div>
    <div class="media-body">

        <a href="{{ route('users.show', $user->id )}}" class="username">{{ $user->name }}</a>
        @can('destroy',$user)
            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-sm btn-danger delete-btn pull-right">删除</button>
            </form>
        @endcan
    </div>

</li>
