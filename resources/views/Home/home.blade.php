@extends("layout")
@section("content")
<main>

    @if (session('message'))
    <p class="flash_message">
        {{ session('message') }}
    </p>
    @endif
    <h2 class="list-title">スレッド一覧</h2>
    <div class="blog-contents">

        @foreach($blog as $blogs)
        <div class="blog-content">

            <a href="/blog/{{$blogs->id}}" class="threadName">

                <p>{{$blogs->created_at}}</p>
                <h4 style="margin-top: 20px;">{{$blogs->title}}</h4>
                <p style="margin-top: 7px;">{{$blogs->contents}}</p>

            </a>

            <?php
            $appear = "";
            $block = "";
            if (Auth::user()->name === $blogs->username) {
                $appear = "appear";
                $block = "block";
            }
            ?>
            <div class="menuicon <?php echo $appear ?>">
                <div class="circle" style="margin-left: 10%;"></div>
                <div class="circle"></div>
                <div class="circle" style="margin-right: 10%;"></div>

            </div>
            <div class="btn-group">
                <button type="button" onclick="location.href='/blog/edit/{{$blogs->id}}'" class="edit-btn  <?php echo $block ?>">編集</button>
                <button type="button" onclick="location.href='/blog/delete/{{$blogs->id}}'" class="delete-btn  <?php echo $block ?>" onSubmit="return checkSubmit()">削除</button>
                <div class="triangle <?php echo $block ?>"></div>
            </div>

            <p class="comment-count">コメント数 : <?php
                $id = $blogs->id;
                $commentnumber = (int)$id;
                $commentdata = DB::table('Comment')->where('commentnumber', $commentnumber)->get();
                $quantity = $commentdata->count();

                echo $quantity
                ?></p>
        </div>
        @endforeach
    </div>

</main>
<script>
    function checkSubmit() {
        if (window.confirm('削除してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
    $(function() {
        $(".menuicon").click(function() {
            $(this).next().toggleClass("block");
        })
    })
</script>
@endsection