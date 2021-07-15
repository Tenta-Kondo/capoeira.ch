<footer>
    <p style="margin-left:1rem;">Capoeira.ch</p>
    <p style="margin-right: 1rem;"><a href="#top">TOP</a></p>
</footer>
</body>
<script>
    $(window).scroll(function() {
        $(function() {
            var imgPos = $("main").offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > imgPos) {
                $(".nav").addClass("fixed-menu");
            }
        });
        $(function() {
            var imgPos = $("main").offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (imgPos > scroll) {
                $(".nav").removeClass("fixed-menu");
            }
        });
    });
    $(function() {
       
        $(".tag").click(function() {
            $(".login-data").toggleClass("position");
        })
        $(".user-data").click(function() {
            $(".user-page-btn").toggleClass("block");
            $("#up,#down").toggleClass("none");
        })
    })
    $(function() {
        $(".hum").click(function() {
            $(".black").toggleClass("black-bg");
            $(".hum").toggleClass("batsu");
            $(".nav-menu").toggle("linear");
        });
    });

 

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