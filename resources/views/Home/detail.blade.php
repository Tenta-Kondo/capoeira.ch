@extends("layout")
@section("content")
    <main>
        <section>
            <div class="all-contents">
                <p style="text-align: left;margin-bottom:6vh;">{{$blog->created_at}}</p>
                <h2 style="margin-bottom: 2rem;font-weight:lighter;" class="detail-title">{{$blog->title}}</h2>

                <div class="contents">
                    <p>{{$blog->contents}}</p>
                </div>
                <span class="name">{{$blog->username}}</span>
            </div>
        </section>
    </main>
@endsection