@extends('layout')

@section('content')
<div class="container">



    <div class="payment-card">
        <div class="payment-card-header">{{ $user->name }}さんの情報</div>

        <div class="card-body">


            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            @if (session('errors'))
            <div class="alert alert-danger" role="alert">
                {{ session('errors') }}
            </div>
            @endif

            <div class="form-group">
                <ul class="payment-list-group">
                    <li class="list-group-item">
                        <span>お名前：</span>
                        <span>{{$user->name}}</span>
                    </li>
                    <li class="list-group-item">
                        <span>メールアドレス：</span>
                        <span>{{$user->email}}</span>
                    </li>
                    <li class="list-group-item">
                        <span>会員種別：</span>
                        @if(!$user->status)
                        <span>無料会員</span>
                        @elseif($user->status === 1)
                        <span>有料会員</span>
                        @endif
                    </li>
                   
                </ul>
            </div>

            <p style="margin-top: 10px;"><a href="/" style="color: black;">サイトトップへ戻る</a></p>

        </div>

    </div>
</div>
</div>


</div>
@endsection