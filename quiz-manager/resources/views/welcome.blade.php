@extends('layouts.master')
@section('title', 'Quiz Manager')
@section('content')
    <div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Quiz Manager
            </div>

            <div class="links">
                @guest
                    <a href="{{ route('login') }}"> Login </a>
                @endguest
                @auth
                    <a href="{{ url('quiz') }}"> View Quizzes </a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
