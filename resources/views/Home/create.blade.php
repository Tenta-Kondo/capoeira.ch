<?php
$threadcount = $thread->count();
$url = url()->previous();
?>
@extends("layout")
@section("content")
<main>
    <a href="{{$url}}" class="back-btn" style="color:black;"><i class="fas fa-arrow-left"></i>前のページへ戻る</a>
    <section class="container-fluid">
        <div class="row">
            <div class="all-contents col-9 col-sm-8 col-md-7">
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
                    <label class="form-label" for="formal">title</label>
                    <input type="text" name="title" class="form-control" id="title formal" placeholder="タイトル(必須)" value="{{ old('title') }}">
                    @if($errors->has("title"))
                    <div class="err_msg">
                        {{$errors->first("title")}}
                    </div>
                    @endif
                    <div id="contents-alert" class="input-alert"></div>
                    <textarea name="contents" class="form-control" cols="30" rows="10" placeholder="内容(必須)" id="contents">{{old('contents')}}</textarea>
                    @if($errors->has("contents"))
                    <div class="err_msg">
                        {{$errors->first("contents")}}
                    </div>
                    @endif
                    @csrf
                    <!-- <label for="thread-image" class="input-file">画像を追加</label> -->
                    <input type="file" name="image" accept="image/png, image/jpeg" id="thread-image" multiple>
                    <!-- <img id="preview" class="none"> -->
                    <div class="gallery"></div>
                    <button type="submit" class="primary-btn" id="thread-create-btn">投稿</button>
                </form>
            </div>
        </div>
    </section>
</main>
<footer id="footer">
    <p style="margin-left:1rem;">Capoeira.ch</p>
    <p style="margin-right: 1rem;"><a href="#top">TOP</a></p>
</footer>
<script>
    $(window).scroll(function() {
        $(function() {
            var imgPos = $("main").offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > imgPos) {
                $("nav").addClass("fixed-menu");
            }
        });
        $(function() {
            var imgPos = $("main").offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (imgPos > scroll) {
                $("nav").removeClass("fixed-menu");
            }
        });
    });
    // $(function() {
    //     var imagesPreview = function(input, placeToInsertImagePreview) {

    //         if (input.files) {
    //             var filesAmount = input.files.length;

    //             for (i = 0; i < filesAmount; i++) {
    //                 var reader = new FileReader();

    //                 reader.onload = function(event) {
    //                     $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
    //                 }

    //                 reader.readAsDataURL(input.files[i]);
    //             }
    //         }

    //     };

    //     $('#thread-image').on('change', function() {
    //         imagesPreview(this, 'div.gallery');
    //     });
    // });



    var form = document.getElementById("create-form");
    var title = document.getElementById("title");
    var contents = document.getElementById("contents");
    var nameAlert = document.getElementById("name-alert");
    var contentsAlert = document.getElementById("contents-alert");

    function inputCheck() {
        while (nameAlert.firstChild) {
            nameAlert.removeChild(nameAlert.firstChild);
        }
        while (contentsAlert.firstChild) {
            contentsAlert.removeChild(contentsAlert.firstChild);
        }
        if (title.value === "") {

            var nameAlert_p = document.createElement("p");
            nameAlert_p.innerHTML = "タイトルを入力してください";
            nameAlert.appendChild(nameAlert_p);
            return false;
        } else if (contents.value === "") {
            var contentsAlert_p = document.createElement("p");
            contentsAlert_p.innerHTML = "本文を入力してください";
            contentsAlert.appendChild(contentsAlert_p);
            return false;
        } else {
            if (window.confirm('投稿してよろしいですか？(スレッドの削除は出来ません)')) {
                return true;
            } else {
                return false;
            }
        }
    }
    // $('#thread-image').on('change', function(e) {
    //     var preview = document.getElementById("preview");
    //     preview.classList.toggle("none");
    //     var reader = new FileReader();
    //     reader.onload = function(e) {
    //         $("#preview").attr('src', e.target.result);
    //     }
    //     reader.readAsDataURL(e.target.files[0]);
    // });
</script>
</body>

</html>
@endsection