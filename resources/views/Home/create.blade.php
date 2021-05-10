<?php
$threadcount = $thread->count();

$url = url()->previous();
?>
@extends("layout")
@section("content")
<main>
    <a href="{{$url}}" style="color:black;margin-left:10px;"><i class="fas fa-arrow-left" style="margin-right: 5px;"></i>前のページへ戻る</a>
    <section>
        <div class="all-contents">
            <h2 style="margin-bottom: 1rem;font-weight:lighter;">スレッド作成</h2>
            <form action="/threadCreating" method="POST" onSubmit="return checkSubmit()" enctype="multipart/form-data" files="true">
                {{ csrf_field() }}

                <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                <input type="text" name="title" placeholder="タイトル(必須)">

                @if($errors->has("title"))
                <div class="err_msg">
                    {{$errors->first("title")}}
                </div>
                @endif
                <textarea name="contents" id="" cols="30" rows="10" placeholder="内容(必須)">{{old('contents')}}</textarea>
                @if($errors->has("contents"))
                <div class="err_msg">
                    {{$errors->first("contents")}}
                </div>
                @endif


                @csrf
                <input type="file" name="image" accept="image/png, image/jpeg">
                <button type="submit" class="primary-btn">投稿</button>

            </form>
        </div>
    </section>
</main>
<script>
    function checkSubmit() {
        if (window.confirm('投稿してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection