<?php
$url = url()->previous();
?>
@extends("layout")
@section("content")
<main>
    <a href="{{$url}}" class="back-btn"><i class="fas fa-arrow-left" style="margin-right: 5px;"></i>前のページへ戻る</a>
    <section class="container-fluid" style="margin-top:20px;">
        <div class="row">
            <div class="all-contents col-md-6 col-sm-8 col-10">
                <h2 style="margin-bottom: 1rem;">投稿編集</h2>
                <form action="/blog/update/{{$blog->id}}" method="POST" onSubmit="return updateCheckSubmit()">
                    {{ csrf_field() }}
                    <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="id" value="{{$blog->id}}">
                    <span class="label">タイトル</span>
                    <input type="text" name="title" placeholder="タイトル(必須)" value="{{$blog->title}}">
                    @if($errors->has("title"))
                    <div class="err_msg">
                        {{$errors->first("title")}}
                    </div>
                    @endif
                    <span class="label">内容</span>
                    <textarea name="contents" id="" cols="30" rows="10" placeholder="内容(必須)">{{$blog->contents}}</textarea>
                    @if($errors->has("contents"))
                    <div class="err_msg">
                        {{$errors->first("contents")}}
                    </div>
                    @endif
                    <button type="submit" class="primary-btn">更新</button>
                </form>
            </div>
        </div>
    </section>
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
    $(function() {
        $(".btn-reply").click(function() {
            $(this).parent().next().toggleClass("flex");
            $(this).next().toggleClass("flex");
            $(this).toggleClass("none");
        })
        $(".reply-close").click(function() {
            $(this).prev().toggleClass("none");
            $(this).toggleClass("flex");
        })
    })


    // var form = document.getElementById("create-form");
    // var title = document.getElementById("title");
    // var contents = document.getElementById("contents");
    // var nameAlert = document.getElementById("name-alert");
    // var contentsAlert = document.getElementById("contents-alert");
    // function inputCheck() {
    //     while (nameAlert.firstChild ) {
    //         nameAlert.removeChild(nameAlert.firstChild);
    //     }
    //     while (contentsAlert.firstChild) {
    //         contentsAlert.removeChild(contentsAlert.firstChild);
    //     }
    //     if (title.value === "") {

    //         var nameAlert_p = document.createElement("p");
    //         nameAlert_p.innerHTML = "タイトルを入力してください";
    //         nameAlert.appendChild(nameAlert_p);
    //         return false;
    //     }else if (contents.value === "") {
    //         var contentsAlert_p = document.createElement("p");
    //         contentsAlert_p.innerHTML = "本文を入力してください";
    //         contentsAlert.appendChild(contentsAlert_p);
    //         return false;
    //     } else {
    //         if (window.confirm('投稿してよろしいですか？(スレッドの削除は出来ません)')) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }
    // }
    function updateCheckSubmit() {
        if (window.confirm('投稿を更新しますか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
</body>

</html>
@endsection