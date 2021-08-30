<?php
$threadcount = $thread->count();
$url = url()->previous();
?>
@extends("layout")
@section("content")
<main>
    <a href="{{$url}}" class="back-btn" style="color:black;"><i class="fas fa-arrow-left"></i>前のページへ戻る</a>
    <section>
        <div class="all-contents">
            <h2 style="margin-bottom: 1rem;">スレッド作成</h2>
            <form action="/threadCreating" method="POST" onSubmit="return inputCheck() " id="create-form" enctype="multipart/form-data" files="true">
                {{ csrf_field() }}
                @if ($errors->any())

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                <div id="name-alert" class="input-alert"></div>
                <input type="text" name="title" id="title" placeholder="タイトル(必須)" value="{{ old('title') }}">

                @if($errors->has("title"))
                <div class="err_msg">
                    {{$errors->first("title")}}
                </div>
                @endif
                <div id="contents-alert" class="input-alert"></div>
                <textarea name="contents" cols="30" rows="10" placeholder="内容(必須)" id="contents">{{old('contents')}}</textarea>
                @if($errors->has("contents"))
                <div class="err_msg">
                    {{$errors->first("contents")}}
                </div>
                @endif
                @csrf
                <input type="file" name="image" accept="image/png, image/jpeg">
                <button type="submit" class="primary-btn" id="thread-create-btn">投稿</button>

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