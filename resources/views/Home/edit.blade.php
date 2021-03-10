@extends("layout")
@section("content")
<main>
    <section>

        <div class="all-contents">
            <h2 style="margin-bottom: 1rem;">投稿編集</h2>
            <form action="/blog/update/{{$blog->id}}" method="POST" onSubmit="return checkSubmit()">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$blog->id}}">
                <span class="label">名前</span>
                <input id="username" type="text" name="username" placeholder="名前(任意)" value="{{$blog->username}}">
                <span class="label">タイトル</span>
                <input type="text" name="title" placeholder="タイトル(必須)" value="{{$blog->title}}">
                @if($errors->has("title"))
                <div class="err_msg">
                    {{$errors->first("title")}}
                </div>
                @endif
                <span class="label">内容</span>
                <textarea name="contents" id="" cols="30" rows="10" placeholder="内容(必須)">{{$blog->contents}}</textarea>
                @if($errors->has("contents"))
                <div class="err_msg">
                    {{$errors->first("contents")}}
                </div>
                @endif
                <button type="submit" class="create-btn">更新</button>
            </form>
        </div>
    </section>
</main>
<script>
    function checkSubmit() {
        if (window.confirm('更新してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection