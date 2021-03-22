<?php
$count = 2;
?>
@extends("layout")
@section("content")
<main>
    <section>
        <div class="all-contents">
            <div class="thread-data">
                <p style="text-align: left;">{{$thread->created_at}}</p>
                <span class="name">作成者 : {{$thread->username}}</span>
            </div>
            <h2 style="font-weight:lighter;" class="detail-title">{{$thread->title}}</h2>


            <div class="comment">
                <div class="comment-data">
                    <span class="right">1</span>
                    <p class="right">{{$thread->created_at}}</p>
                    <p>作成者 : {{$thread->username}}</p>
                </div>
                <p class="comment-content">{{$thread->contents}}</p>
            </div>
            @foreach ($commentnumber as $comment)
            <div class="comment">
                <div class="comment-data">
                    <span class="right">{{$count++}}</span>
                    <p class="right">{{$comment->created_at}}</p>
                    <p>作成者 : {{$comment->name}}</p>
                </div>
                <p class="comment-content">{{$comment->comment}}</p>
            </div>
            @endforeach
        </div>
        <form action="/comment" method="POST" class="comment-form">
            {{ csrf_field() }}
            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
            <input type="hidden" name="commentnumber" value="{{$thread->id}}">
            <textarea name="comment" id="" cols="30" rows="10" placeholder="コメントを入力"></textarea>
            <button type="submit" class="btn">コメントを投稿</button>
        </form>
    </section>
</main>
@endsection