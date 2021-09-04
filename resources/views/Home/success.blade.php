@extends('layouts.app') @section('content')<div class="container"> @guest @if (Route::has('login')) @endif @if (Route::has('register')) @endif @else<div class="login-data">
        <p id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup aria-expanded="false" v-pre> USER NAME : {{ Auth::user()->name }}
        <p>MAIL ADRESS : {{ Auth::user()->email }}</p><a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf</form>
        <div class="tag">
            <p>USER INFO
        </div>
    </div>@endguest<div class="card">
        <div class="cardTitle">{{ __('Successful login!') }}</div>
        <div class="card-body">@if (session('status'))<div class="alert alert-success" role="alert"> {{ session('status') }}</div>@endif<div style="display:flex;flex-direction:column"> <a href="/">{{ __('トップページへ=>') }}</a> <a href="/top">{{ __('掲示板へ=>') }}</a></div>
        </div>
    </div>
</div>@endsection