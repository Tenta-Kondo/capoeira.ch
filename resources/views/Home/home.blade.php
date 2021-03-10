@extends("layout")
@section("content")
<main>

    @if (session('message'))
    <p class="flash_message">
        {{ session('message') }}
    </p>
    @endif
    <h2 class="list-title">ブログ一覧</h2>
    <div class="blog-contents">
        @foreach($blog as $blogs)
        <div class="blog-content">
            <a href="/blog/{{$blogs->id}}">
                <img src="{{asset('./image/ダウンロード.jfif')}}" alt="">
                <p>{{$blogs->created_at}}</p>
                <h4>{{$blogs->title}}</h4>
            </a>
            <button type="button" onclick="location.href='/blog/edit/{{$blogs->id}}'" class="edit-btn">編集</button>
            <button type="button" onclick="location.href='/blog/delete/{{$blogs->id}}'" class="delete-btn">削除</button>
        </div>
        @endforeach
    </div>
</main>
@endsection