@extends("layout")
@section("content")
<div class="blog-contents">
    <div class="search-header">
        <div class="search-data">
            <h3 style="margin-right: 3vw;">
                検索ワード：{{$searchWord}}</h3>
            <h3>
                該当件数：{{ $Threadcount }}
            </h3>
        </div>
        <form action="/search" class="search-form">
            <input type="text" placeholder="タイトルで検索" name="search-word" class="search-input">
            <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
        </form>
    </div>
    @foreach($searchThread as $threads)
    <div class="blog-content">
        <div class="thread-head">
            <p class="right">{{$threads->created_at}}</p>
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
        <h4 style="margin-top: 20px;"> <a href="/thread/{{$threads->id}}" style="font-weight: lighter;">スレッドタイトル : {{$threads->title}}</a></h4>
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
{{ $searchThread->links('pagination::default') }}
@endsection