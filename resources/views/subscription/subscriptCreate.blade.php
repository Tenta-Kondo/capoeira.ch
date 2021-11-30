@extends('layout')
@section('content')
<main>

    <div class="container-fluid">
        <div class="row">
            <div class="payment-card col-10 col-md-6">
                <div class="payment-card-header">{{ $user->name }}さんの情報</div>
                <div class="card-body">
                    @if($icon_image)
                    <img src="{{$icon_image->file_path}}" alt="" class="icon-image" id="icon">
                    @else
                    <img src="{{asset('image/f318x318.jpg')}}" class="icon-image" alt="" id="icon-unknown">
                    @endif
                    <img id="preview" class="icon-image none">
                    <div class="form-group">
                        <form action="/icon" method="POST" files="true" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div style="display: flex;">
                                <label for="icon-image" class="input-file">＋アイコンを変更</label>
                                <input type="file" name="image" accept="image/png, image/jpeg" id="icon-image">
                                <button type="submit" style="border: none;background:white;margin-left:10px;">保存</button>
                            </div>
                        </form>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">お名前：</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">メールアドレス：</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">会員種別：</th>
                                    <td>@if(!$user->status )
                                        <span>無料会員</span>
                                        @elseif($user->status === 1)
                                        <span>有料会員</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if($user->stripe_id || $defaultCard2 )
                        @if(!$user->status )
                        <div class="subsc-btn-group">
                            <form action="/user/paid" method="POST" onSubmit="return subscCheckSubmit()">
                                @csrf
                                <button id="" type="submit" class="btn btn-primary subsc-btn" style="display:flex;">有料会員登録はこちら</button>
                            </form>
                            <form action="/delete/card" method="POST">
                                @csrf
                                <button id="" type="submit" class="btn btn-primary subsc-btn" style="display:flex;">カード情報削除はこちら</button>
                            </form>
                        </div>
                        @elseif($user->status === 1)
                        <p>下記ボタンを押すことで、有料会員を解約することができます。再度有料会員になる際は新たにお支払いが必要になりますので、ご注意ください。</p>
                        <form action="/user/cancel" method="POST" onSubmit="return cancelCheckSubmit()">
                            @csrf
                            <button id="" class="btn btn-danger" style="display:flex;">有料会員を解約する</button>
                        </form>
                        @endif
                        @else
                        <p>有料会員登録をするためには、クレジットカード登録を行っていただく必要があります。登録した後に有料会員申し込みの手続を行ってください。</p>
                        <button type="btn" class="btn btn-primary" onclick="location.href='/user/payment/form'" style="display:flex;">カード登録はこちら</button>
                        @endif
                    </div>
                    <p style="margin-top: 10px;"><a href="/" style="color: black;">サイトトップへ戻る</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</main>
<footer id="footer">
    <p style="margin-left:1rem;">Capoeira.ch</p>
    <p style="margin-right: 1rem;"><a href="#top">TOP</a></p>
</footer>
<script>
    $(window).scroll(function() {
        $(function() {
            var imgPos = $("main").offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > imgPos) {
                $("nav").addClass("fixed-menu");
            }
        });
        $(function() {
            var imgPos = $("main").offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (imgPos > scroll) {
                $("nav").removeClass("fixed-menu");
            }
        });
    });

    function subscCheckSubmit() {
        if (window.confirm('サブスクリプションを開始してよろしいですか？キャンセル料はかかりません。')) {
            return true;
        } else {
            return false;
        }
    }

    function cancelCheckSubmit() {
        if (window.confirm('有料会員を解約してよろしいですか？再度会員になるには料金がかかります。')) {
            return true;
        } else {
            return false;
        }
    }

    $('#icon-image').on('change', function(e) {
        var preview =document.getElementById("preview");
        preview.classList.toggle("none");
        var iconImage = document.getElementById("icon");
        var iconUnknown = document.getElementById("icon-unknown")
        if (iconImage) {
            iconImage.classList.toggle("none");
        } else if (iconUnknown) {
            iconUnknown.classList.toggle("none");
        }
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#preview").attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
</body>

</html>
@endsection