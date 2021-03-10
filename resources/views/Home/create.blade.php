@extends("layout")
@section("content")
<main>
    <section>

        <div class="all-contents">
            <h2 style="margin-bottom: 1rem;">投稿作成</h2>
            <form action="/blog/creating" method="POST" onSubmit="return checkSubmit()">
                {{ csrf_field() }}
                <input type="text" name="username" placeholder="名前(任意)" value="{{old('username')}}">
                <input type="text" name="title" placeholder="タイトル(必須)" value="{{old('title')}}">
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
                <button type="submit" class="create-btn">投稿</button>
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