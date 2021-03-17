@extends('layouts.app')

@section('content')
<div class="container">
    <div class="userdata">

        @guest

        @else

        <p id="navbarDropdown"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
            USER NAME : {{ Auth::user()->name }}
        </p>

        <p id="navbarDropdown"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
            MAIL ADRESS : {{ Auth::user()->email }}
        </p>
        <div class="logout-btn">
            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logoutはこちら') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        @endguest
        <button class="open-btn"><span class="icon"><</span><p>USER INFO</p></button>
    </div>
   
    <div class="card">
        <div class="card-header">{{ __('ログイン成功') }}</div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            {{ __('You are logged in!') }}
            <h3 style="margin-top: 6px;"><a href="/top" style="color: black;">掲示板へ＝＞</a></h3>
        </div>
    </div>


</div>
@endsection