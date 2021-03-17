@extends('layouts.app')

@section('content')
<div class="container">


    <div class="card">
        <div class="card-header">
            ACCOUNT LOGIN
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf


                <label for="email">{{ __('メールアドレス') }}</label>


                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror



                <div class="pass">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>


                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="text-align: center;margin-left:27px;color:black;font-size:80%;">
                        {{ __('(パスワードを忘れた場合はこちら)') }}
                    </a>
                    @endif
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror





                <div class="form-check">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        {{ __('ログイン情報を保存する') }}
                    </label>
                </div>
                <button type="submit" class="btn">
                    {{ __('ログイン') }}
                </button>
            </form>

            @if (Route::has('register'))
            <p class="nav-item">
                <a class="nav-link" href="{{ route('register') }}" style="color: black;border-bottom:solid 0.2px black;">{{ __('アカウント新規作成はこちら') }}</a>
            </p>
            @endif

        </div>
    </div>
</div>
@endsection