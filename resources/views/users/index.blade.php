@extends('layout.default')
@section('title', 'Books')

@section('content')
    @include('layout._header')
    <div id="content">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            @foreach ($users as $user)
                <section class="row">
                    @include('users._user')
                </section>
            @endforeach
            {!! $users->render() !!}
        <section class="row">
            <div class="col-full"></div>
        </section>
        @include('layout._footer')

    </div>
@stop