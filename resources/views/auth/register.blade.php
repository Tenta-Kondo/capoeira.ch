@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <p>{{ __('CREATE') }}</p>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf
                <label for="name">{{ __('アペリード(ユーザーネーム)') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror regi-inp" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="email">{{ __('メールアドレス') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror regi-inp" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="password">{{ __('パスワード') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror regi-inp" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード(確認用)') }}</label>

                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

                <button type="submit" class="btn"  style="margin-bottom: 10px;">
                    {{ __('CREATE') }}
                </button>


            </form>
    <a href="/login" class="registerlink">アカウントをお持ちの場合はこちら</a>
        </div>
    </div>
</div>
@endsection