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
                        @if(!$user->status || $user->status === 0)
                        <span>無料会員</span>
                        @elseif($user->status === 1)
                        <span>有料会員</span>
                        @endif
                    </li>
                    <li class="list-group-item">

                        @if($user->stripe_id || $defaultCard2 )
                        @if(!$user->status || $user->status === 0)

                        <form action="/user/paid" method="POST" onSubmit="return subscCheckSubmit()">
                            @csrf
                            <button id="" type="submit" class="btn btn-primary">有料会員登録はこちら</button>
                        </form>
                        <form action="/delete/card" method="POST">
                            @csrf
                            <button id="" type="submit" class="btn btn-primary">カード情報削除はこちら</button>
                        </form>
                        @elseif($user->status === 1)
                        <p>下記ボタンを押すことで、有料会員を解約することができます。再度有料会員になる際は新たにお支払いが必要になりますので、ご注意ください。</p>
                        <form action="/user/cancel" method="POST" onSubmit="return cancelCheckSubmit()">
                            @csrf
                            <button id="" class="btn btn-danger">有料会員を解約する</button>
                        </form>
                        @endif

                        @else
                        <p>有料会員登録をするためには、クレジットカード登録を行っていただく必要があります。登録した後に有料会員申し込みの手続を行ってください。</p>
                        <button type="btn" class="btn" onclick="location.href='/user/payment/form'">カード登録はこちら</button>
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