<?php
$count = 2;
$commentcount = $commentnumber->count();
$url = url()->previous();
?>
@extends("layout")
@section("content")
<main>
    <section class="container-fluid">
        <div class="row">
            <a href="{{$url}}" class="back-btn"><i class="fas fa-arrow-left" style="margin-right: 5px;"></i>前のページへ戻る</a>
            <div class="all-contents col-10 col-md-8">
                <div class="thread-data">
                    <p style="text-align: left;">{{$thread->created_at}}</p>
                    <span class="name">スレッド作成者 : {{$thread->username}}</span>
                </div>
                <h2 style="font-weight:lighter;" class="detail-title">{{$thread->title}}</h2>
                <div class="comment">
                    <div class="comment-data">
                        <span class="right">1</span>
                        <p class="right">{{$thread->created_at}}</p>
                        <p>作成者 : {{$thread->username}}</p>
                    </div>
                    <p class="comment-content">{{$thread->contents}}</p>
                    <?php
                    $title = $thread->title;
                    $img = $topimage->first();
                    ?>
                    @if($img)
                    <img src="{{$img->file_path}}" alt="">
                    @endif
                    <button type="btn" class="btn-reply" id="btn-reply"><i class="fas fa-level-up-alt"></i>この投稿へ返信する</button>
                    <button type="btn" class="btn-reply reply-close" id="reply-close"><i class="fas fa-level-up-alt"></i>閉じる</button>
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
                    <input type="file" name="image" accept="image/png, image/jpeg" style="font-size: 0.8rem;">
                    <button type="submit" class="primary-btn">返信を投稿</button>
                </form>
                @foreach ($commentnumber as $comment)
                <div class="comment visitor">
                    <div class="comment-data">
                        <span class="right">{{$count++}}</span>
                        <p class="right">{{$comment->created_at}}</p>
                        <p>作成者 : {{$comment->name}}</p>
                    </div>
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

                    <input type="file" name="image" accept="image/png, image/jpeg" style="font-size: 0.8rem;">
                    <button type="submit" class="primary-btn">返信を投稿</button>
                </form>
                @endforeach
            </div>
            <form action="/comment" method="POST" class="comment-form col-md-6 col-sm-8 col-10" enctype="multipart/form-data" files="true">
                {{ csrf_field() }}
                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                <input type="hidden" name="commentID" id="" value="{{$commentcount+1}}">
                <input type="hidden" name="commentnumber" value="{{$thread->id}}">
                <textarea name="comment" id="" cols="30" rows="10" placeholder="コメントを入力"></textarea>
                @if($errors->has("comment"))
                <div class="err_msg">
                    {{$errors->first("comment")}}
                </div>
                @endif

                <input type="file" name="image" accept="image/png, image/jpeg" class="file-input">
                <button type="submit" class="btn-simple" style="margin-top: 10px;">コメントを投稿</button>
            </form>
        </div>
    </section>
</main>

@endsection