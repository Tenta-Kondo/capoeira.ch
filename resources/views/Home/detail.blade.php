<?php
$commentID = 2;
?>
@extends("layout")
@section("content")

<main>
    <section>
        <div class="all-contents">
            <div class="first">
                <div class="thread-data">
                    <p>{{$blog->created_at}}</p>

                    <p class="name">作成者 : {{$blog->username}}</p>
                </div>

                <h2 style="margin-top:0.8em;font-weight:lighter;" class="detail-title">{{$blog->title}}</h2>
                <hr>
                <div class="comment">
                    <div class="comment-data">
                        <p>1</p>
                        <p>投稿者 : {{$blog->username}}</p>
                        <p>{{$blog->created_at}}</p>
                    </div>
                    <div class="contents">
                        <p>{{$blog->contents}}</p>
                    </div>
                    <p class="reply-btn"><i class="fas fa-level-up-alt"></i><span class="reply">返信する</span><span class="close">閉じる</span></p>
                </div>
                <form action="/thread/comment" method="POST" class="reply-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="name" id="" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="commentnumber" value="{{$blog->id}}">
                    <textarea name="comment" id="" cols="30" rows=7" class="reply-text" placeholder="コメントを入力">>>{{$blog->username}}</textarea>
                    <button type="submit" class="create-btn">返信を投稿</button>
                </form>
            </div>

            <div class="other">
                @foreach($commentdata as $comment)
                <div class="comment">
                    <div class="comment-data">
                        <p>{{$commentID++}}</p>
                        <p>投稿者 : {{$comment->name}}</p>
                        <p>{{$comment->created_at}}</p>
                    </div>
                    <p>{{$comment->comment}}</p>
                    <p class="reply-btn"><i class="fas fa-level-up-alt"></i><span class="reply">返信する</span><span class="close">閉じる</span></p>
                </div>
                <form action="/thread/comment" method="POST" class="reply-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="name" id="" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="commentnumber" value="{{$blog->id}}">
                    <textarea name="comment" id="" cols="30" rows=7" class="reply-text" placeholder="コメントを入力">>>{{$comment->name}}</textarea>
                    <button type="submit" class="create-btn">返信を投稿</button>
                </form>
                @endforeach
            </div>
        </div>
    </section>

    <form action="/thread/comment" method="POST" class="comment-form">
        {{ csrf_field() }}
        <input type="hidden" name="name" id="" value="{{ Auth::user()->name }}">
        <input type="hidden" name="commentnumber" value="{{$blog->id}}">
        <textarea name="comment" id="" cols="30" rows="10" class="comment-text" placeholder="コメントを入力"></textarea>
        <button type="submit" class="create-btn">コメントを投稿</button>

    </form>
</main>
@endsection