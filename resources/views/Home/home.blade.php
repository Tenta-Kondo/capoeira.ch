<?php

$count = 1;
?>
@extends("layout")
@section("content")
<main>

    @if (session('message'))
    <p class="flash_message">
        {{ session('message') }}
    </p>
    @endif
    <h2 class="list-title">Thread List</h2>
    <div class="blog-contents">
        @foreach($thread as $threads)
        <div class="blog-content">


            <div class="thread-head">
                <span class="right">{{$count++}}</span>
                <p class="right">{{$threads->created_at}}</p>
                <p>{{$threads->id}}</p>
                <p>作成者 : {{$threads->username}}</p>
                <?php
                $class = "";
                if ($threads->username === Auth::user()->name) {
                    $class = "flex";
                }

                ?>
                <div class="open-btn <?php echo $class ?>">
                    <span class="circle"></span>
                    <span class="circle"></span>
                    <span class="circle"></span>
                </div>

                <div class="btn-group">
                    <div class="triangle"></div>
                    <button type="button" onclick="location.href='/blog/edit/{{$threads->id}}'" class="edit-btn ">編集</button>
                    <button type="button" onSubmit="return checkSubmit()" onclick="location.href='/blog/delete/{{$threads->id}}'" class="delete-btn">削除</button>
                </div>
            </div>
            <h4 style="margin-top: 20px;"> <a href="/thread/{{$threads->id}}">{{$threads->title}}</a></h4>
            <p style="margin-top: 10px;"> <a href="/thread/{{$threads->id}}">{{$threads->contents}}</a></p>
            <?php
            $title = $threads->title;

            $img = $image->where("title", $title)->first();
            ?>
            @if($img)
            <img src="{{$img->file_path}}" alt="">
            @endif
            <div class="right-bottom">

                <p>コメント数 : <?php
                            $id = $threads->id;
                            $commentN = (int)$id;
                            $commentcount = $comment->where("commentnumber", $commentN)->count();
                            echo $commentcount
                            ?></p>
                <a href="/thread/{{$threads->id}}" class="detail-link">スレッドへ</a>
            </div>
        </div>
        @endforeach
    </div>

</main>
{{ $thread->links('pagination::default') }}

@endsection