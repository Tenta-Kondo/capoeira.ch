<?php
$threadcount = $thread->count();
?>
@extends("layout")
@section("content")
<main>
    <section>
        <div class="all-contents">
            <h2 style="margin-bottom: 1rem;font-weight:lighter;">スレッド作成</h2>
            <form action="/blog/creating" method="POST" onSubmit="return checkSubmit()" enctype="multipart/form-data" files="true">
                {{ csrf_field() }}
                <input type="hidden" name="threadnumber" value="{{$threadcount+1}}">
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