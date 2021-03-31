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
        $(".open-btn").click(function() {
            $(this).next().toggleClass("flex");
        })
        $(".tag").click(function() {
            $(".login-data").toggleClass("position");
        })
        $(".user-data").click(function() {
            $(".logout-btn,.user-page-btn").toggleClass("block");
            $("#up,#down").toggleClass("none");
        })
    })
    $(function() {
        let fuga = '.fuga';
        let $animsition = $('.animsition');

        $animsition.animsition({
            inClass: 'flip-in-x-fr',
            outClass: 'flip-out-x-fr',
            inDuration: 1500,
            outDuration: 800,
            linkElement: fuga
        });
    });



    function checkSubmit() {
        if (window.confirm('投稿してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>

</html>