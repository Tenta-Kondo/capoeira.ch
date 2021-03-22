@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <p>{{ __('LOGIN') }}</p>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <label for="email">{{ __('メールアドレス') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="password">
                    <label for="password">{{ __('パスワード') }}</label>
                    @if (Route::has('password.request'))
                    <a class="forget" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れた場合はこちら') }}
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
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('ログイン情報を記憶する') }}
                    </label>
                </div>



                <button type="submit" class="btn" style="margin-bottom: 10px;">
                    {{ __('LOGIN') }}
                </button>




            </form>
            <a href="/register" class="registerlink">アカウントをお持ちでない場合はこちら</a>
        </div>
    </div>
</div>
@endsection