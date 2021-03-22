<footer>
    <p style="margin-left:1rem;">Capoeira.ch</p>
    <p style="margin-right: 1rem;"><a href="#top">TOP</a></p>
</footer>
</body>
<script>
    $(function() {
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
        })
    });
    $(function() {
        $(".tag").click(function() {
            $(".login-data").toggleClass("position");
        })
    })

    function checkSubmit() {
        if (window.confirm('投稿してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>

</html>