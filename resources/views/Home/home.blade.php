@extends("layout")
@section("content")
<main style="position: relative;">

    @if (session()->has('message'))
    <p class="flash_message">
        {{ session('message') }}
        err
    </p>

    @elseif(session('deletemessage'))
    <p class="flash_message">
        {{ session('deletemessage') }}
    </p>
    @elseif(session('updatemessage'))
    <p class="flash_message">
        {{ session('updatemessage') }}
    </p>
    @endif
    <div class="main-contents container-fluid">
        <div class="search-header">
            <h2>{{ session('message') }}</h2>
            <form action="/search" class="search-form">
                <input type="text" placeholder="タイトルで検索" name="search-word" class="search-input">
                <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="thread-contents row">
            @foreach($thread as $threads)
            <div class="thread-content col-md-6 col-10">

                <h3 style="margin-top: 20px;"> <a href="/thread/{{$threads->id}}" style="font-family: initial;" class="thread-title">{{$threads->title}}</a></h3>
                <p style="margin-top: 10px;"> <a href="/thread/{{$threads->id}}">{{$threads->contents}}</a></p>
                <?php
                $title = $threads->title;

                $img = $image->where("title", $title)->first();
                ?>
                @if($img)
                <img src="{{$img->file_path}}" alt="">
                @endif

                <div class="right-bottom">


                    <div class="thread-head">
                        <p class="right">{{$threads->created_at}}</p>
                        <p>作成者 : {{$threads->username}}</p>
                    </div>
                    <div style="display: flex;justify-content:flex-end;">
                        <p style="margin:3px 10px 0 0;"><i class="far fa-comment fa-lg" style="margin-right: 10px;"></i><?php
                                                                                                                        $id = $threads->id;
                                                                                                                        $commentN = (int)$id;
                                                                                                                        $commentcount = $comment->where("commentnumber", $commentN)->count();
                                                                                                                        echo $commentcount
                                                                                                                        ?></p>
                        <a href="/thread/{{$threads->id}}" class="detail-link">スレッドへ</a>
                        <?php
                        $class = "";
                        if ($threads->username === Auth::user()->name) {
                            $class = "block";
                        }

                        ?>
                    </div>
                    <p class="edit-link <?php echo $class ?>"><a href="/blog/edit/{{$threads->id}}"><i class="fas fa-info-circle" style="margin-right: 5px;"></i>スレッドを編集</a></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</main>
{{ $thread->links('pagination::default') }}

@endsection