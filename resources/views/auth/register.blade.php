@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">ACCOUNT CREATE</div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf


                <label for="name">{{ __('アペリード(スレッド・コメント投稿時表示されます)') }}</label>


                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror




                <label for="email" class="label">{{ __('メールアドレス') }}</label>


                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror




                <label for="password" class="label">{{ __('パスワード') }}</label>


                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror



                <label for="password-confirm" class="label">{{ __('パスワード(確認)') }}</label>


                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                <button type="submit" class="btn">
                    {{ __('作成') }}
                </button>

            </form>

            @if (Route::has('login'))
            <p class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" style="border-bottom:solid 0.2px black;">{{ __('アカウント作成済みの方はこちら') }}</a>
            </p>
            @endif



        </div>
    </div>
</div>
@endsection