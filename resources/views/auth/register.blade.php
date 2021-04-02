@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <p>{{ __('CREATE') }}</p>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" class="register-form">
                {{ csrf_field() }}
                <label for="name" class="regi-label">{{ __('アペリード(ユーザーネーム) *変更出来ません') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <div class="err_msg">{{ $message }}</div>
                </span>
                @enderror
                <label for="email" class="regi-label">{{ __('メールアドレス') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <div class="err_msg">{{ $message }}</div>
                </span>
                @enderror
                <label for="password" class="regi-label">{{ __('パスワード') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <div class="err_msg">{{ $message }}</div>
                </span>
                @enderror
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right regi-label">{{ __('パスワード(確認用)') }}</label>

                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" style="margin-bottom: 15px;">

                <button type="submit" class="btn" style="margin-bottom: 10px;">
                    {{ __('CREATE') }}
                </button>


            </form>
            <ul style="display:flex;flex-direction:column;">
                <li> <a href="/login" class="registerlink">アカウントをお持ちの場合はこちら</a></li>
                <li><a href="/" class="registerlink">トップへ戻る</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection