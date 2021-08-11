@extends("layout")
@section("content")
<main>

    <div class="sitetop-header">
        <div class="sitetop-title">
            <h2><span style="font-weight: lighter;">カポエイリスタ用掲示板<br class="br"></span> Capoeira.ch</h2>
        </div>
        <div class="sitetop-nav">
            <p>Capoeira.chは、カポエイリスタによるカポエイリスタの為の掲示板です。<br>
                roda情報・情報共有・動画へのアドバイス・雑談etc...<br>
                所属団体不問です。<br>
                団体の壁を越えて繋がりましょう！
            </p>
        </div>

    </div>
    <div class="nav-link">
        <a href="/top">
            <p>掲示板へ行く</p>
        </a>
    </div>

    @if(!$user->status)
    <div class="nav-link">
        <a href="/user-page">
            <p>有料会員登録はこちら</p>
        </a>
    </div>
    @endif
    @if($user->status === 1)
    <div class="nav-link">
        <a href="/user/paidpage"></a>
        <p>有料会員限定ページはこちら</p>
    </div>
    @endif
    <div class=" nav-link">

        <p>coming soon</p>

    </div>
    <hr width="70%" style="margin:0 auto;margin-top: 50px;">
    <div class=""></div>


</main>
@endsection