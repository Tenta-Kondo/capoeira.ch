<!-- @extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <p>{{ __('LOGIN') }}</p>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="login-form">
            {{ csrf_field() }}

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
           
            <ul style="display:flex;flex-direction:column;">
                <li><a href="/register" class="registerlink">アカウントをお持ちでない場合はこちら</a></li>
                <li><a href="/" class="registerlink">トップへ戻る</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection -->

@extends('layouts.app')

@section('content')

<div class="row" style="margin: 0 auto;">
    <div class="card col-12" style="padding: 5px 20px;">
        <div class="cardTitle">
            <h2>{{ __('LOGIN') }}</h2>
        </div>

        <div class="card-form">
            <form method="POST" action="{{ route('login') }}" class="login-form">
                {{ csrf_field() }}

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



                <button type="submit" class="btn btn-outline-primary" style="margin-bottom: 10px;">
                    {{ __('LOGIN') }}
                </button>




            </form>

            <ul style="display:flex;flex-direction:column;">
                <li><a href="/register" class="registerlink">アカウントをお持ちでない場合はこちら</a></li>
                <li><a href="/" class="registerlink">トップへ戻る</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection