<?php
$count = 2;
$commentcount = $commentnumber->count();
$url = url()->previous();
?>
@extends("layout")
@section("content")
<main>
    <section class="container-fluid" style="margin-top:20px;">
        <div class="row" style="margin: 0;">
            <a href="{{$url}}" class="back-btn"><i class="fas fa-arrow-left" style="margin-right: 5px;"></i>前のページへ戻る</a>
            <div class="all-contents col-10 col-md-8">
                <div class="thread-data">
                    <p style="text-align: left;">{{$thread->created_at}}</p>
                    <span class="name">スレッド作成者 :
                        @if($thread->IconString)
                        <img src="{{$thread->IconString}}" alt="" class="user-icon rounded-circle">
                        @else
                        <img src="{{asset('image/f318x318.jpg')}}" alt="" class="user-icon rounded-circle">
                        @endif
                        {{$thread->username}}</span>
                </div>
                <h2 style="font-weight:lighter;" class="detail-title">{{$thread->title}}</h2>
                <div class="comment">
                    <div class="comment-data">
                        <span class="right">1</span>
                        <p class="right">{{$thread->created_at}}</p>
                        <p>作成者 :
                            @if($thread->IconString)
                            <img src="{{$thread->IconString}}" alt="" class="user-icon rounded-circle">
                            @else
                            <img src="{{asset('image/f318x318.jpg')}}" alt="" class="user-icon rounded-circle">
                            @endif
                            {{$thread->username}}
                        </p>
                    </div>
                    <div class="flex" style="flex-direction: column;">
                        <p class="comment-content">{{$thread->contents}}</p>
                        <?php
                        $title = $thread->title;
                        $img = $topimage->all();
                        ?>
                        @if($img)
                        @foreach($img as $imgs)
                        <img src="{{$imgs->file_path}}" alt="">
                        @endforeach
                        @endif
                        <button type="btn" class="btn-reply" id="btn-reply"><i class="fas fa-level-up-alt"></i>この投稿へ返信する</button>
                        <button type="btn" class="btn-reply reply-close" id="reply-close"><i class="fas fa-level-up-alt"></i>閉じる</button>
                    </div>
                </div>
                <form action="/comment" method="POST" id="reply-form" class="reply-form" enctype="multipart/form-data" files="true">
                    {{ csrf_field() }}
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="commentID" id="" value="{{$commentcount+1}}">
                    <input type="hidden" name="commentnumber" value="{{$thread->id}}">
                    <textarea name="comment" id="" cols="30" rows="5" placeholder="コメントを入力">>>{{$thread->username}}</textarea>
                    @if($errors->has("comment"))
                    <div class="err_msg">
                        {{$errors->first("comment")}}
                    </div>
                    @endif
                    <label for="main-reply-image" class="input-file">画像を追加</label>
                    <input type="file" name="image" accept="image/png, image/jpeg" id="main-reply-image">
                    <button type="submit" class="primary-btn">返信を投稿</button>
                </form>
                @foreach ($commentnumber as $comment)
                <div class="comment visitor">
                    <div class="comment-data">
                        <span class="right">{{$count++}}</span>
                        <p class="right">{{$comment->created_at}}</p>
                        <p>作成者 :
                            @if($comment->IconString)
                            <img src="{{$comment->IconString}}" alt="" class="user-icon rounded-circle">
                            @else
                            <img src="{{asset('image/f318x318.jpg')}}" alt="" class="user-icon rounded-circle">
                            @endif
                            {{$comment->name}}
                        </p>
                    </div>
                    <div class="flex" style="flex-direction: column;">
                        <p class="comment-content">{{$comment->comment}}</p>
                        <?php
                        $commentID = $comment->commentID;
                        $img = $image->where("comment-img-number", $commentID)->first();
                        ?>
                        @if($img)
                        <img src="{{$img->file_path}}" alt="">
                        @endif
                        <button type="btn" class="btn-reply"><i class="fas fa-level-up-alt"></i>この投稿へ返信する</button>
                        <button type="btn" class="btn-reply reply-close"><i class="fas fa-level-up-alt"></i>閉じる</button>
                    </div>
                </div>
                <form action="/comment" method="POST" class="reply-form" enctype="multipart/form-data" files="true">
                    {{ csrf_field() }}
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="commentID" id="" value="{{$commentcount+1}}">
                    <input type="hidden" name="commentnumber" value="{{$thread->id}}">
                    <textarea name="comment" id="" cols="30" rows="5" placeholder="コメントを入力">>>{{$comment->name}}</textarea>
                    @if($errors->has("comment"))
                    <div class="err_msg">
                        {{$errors->first("comment")}}
                    </div>
                    @endif
                    <label for="reply-image" class="input-file">画像を追加</label>
                    <input type="file" name="image" accept="image/png, image/jpeg" id="reply-image">
                    <button type="submit" class="primary-btn">返信を投稿</button>
                </form>
                @endforeach
            </div>
            <form action="/comment" method="POST" class="comment-form col-md-5 col-sm-8 col-10" enctype="multipart/form-data" files="true">
                {{ csrf_field() }}
                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                <input type="hidden" name="email" value="{{Auth::user()->email}}">
                <input type="hidden" name="commentID" id="" value="{{$commentcount+1}}">
                <input type="hidden" name="commentnumber" value="{{$thread->id}}">
                <textarea name="comment" id="" cols="30" rows="6" placeholder="コメントを入力"></textarea>
                @if($errors->has("comment"))
                <div class="err_msg">
                    {{$errors->first("comment")}}
                </div>
                @endif
                <label for="create-image" class="input-file">画像を追加</label>
                <input type="file" name="image" accept="image/png, image/jpeg" id="create-image">
                <button type="submit">掲示板に書き込む</button>
            </form>
        </div>
        <button class="form-display btn-outline-primary">書き込む</button>
        <div class="black-bg"></div>
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
            $(this).parent().parent().next().toggleClass("flex");
            $(this).next().toggleClass("flex");
            $(this).toggleClass("none");
        })
        $(".reply-close").click(function() {
            $(this).prev().toggleClass("none");
            $(this).toggleClass("flex");
        })
    })
    $(function() {
        $(".form-display").click(function() {
            $(".comment-form").toggle("display");
            $(".black-bg").toggle("display");
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
</script>
</body>

</html>
@endsection