<footer id="footer">
    <p style="margin-left:1rem;">Capoeira.ch</p>
    <p style="margin-right: 1rem;"><a href="#top">TOP</a></p>
</footer>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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




    function checkSubmit() {
        if (window.confirm('投稿してよろしいですか？')) {
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
        if (window.confirm('有料会員を解約してよろしいですか？再度なるには料金がかかります。')) {
            return true;
        } else {
            return false;
        }
    }
</script>

</html>