<footer id="footer">
    <p style="margin-left:1rem;">Capoeira.ch</p>
    <p style="margin-right: 1rem;"><a href="#top">TOP</a></p>
</footer>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</body>

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
    $(function() {
        $(".btn-reply").click(function() {
            $(this).parent().next().toggleClass("flex");
            $(this).next().toggleClass("flex");
            $(this).toggleClass("none");
        })
        $(".reply-close").click(function() {
            $(this).prev().toggleClass("none");
            $(this).toggleClass("flex");
        })
    })


    // function checkSubmit() {
    //     if (window.confirm('投稿してよろしいですか？(スレッドの削除は出来ません)')) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    var form = document.getElementById("create-form");
    var title = document.getElementById("title");
    var contents = document.getElementById("contents");
    var nameAlert = document.getElementById("name-alert");
    var contentsAlert = document.getElementById("contents-alert");

    function inputCheck() {
        while (nameAlert.firstChild ) {
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
        }else if (contents.value === "") {
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



    function updateCheckSubmit() {
        if (window.confirm('投稿を更新しますか？')) {
            return true;
        } else {
            return false;
        }
    }

    function subscCheckSubmit() {
        if (window.confirm('サブスクリプションを開始してよろしいですか？キャンセル料はかかりません。')) {
            return true;
        } else {
            return false;
        }
    }

    function cancelCheckSubmit() {
        if (window.confirm('有料会員を解約してよろしいですか？再度会員になるには料金がかかります。')) {
            return true;
        } else {
            return false;
        }
    }
</script>

</html>