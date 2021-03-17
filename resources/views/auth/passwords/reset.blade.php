@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">{{ __('Reset Password') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">


                <label for="email" class="">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <label for="password" class="">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror



                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>


                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">





                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>


            </form>

        </div>
    </div>
</div>
@endsection