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
        $(function(){
            $(".reply-btn").click(function(){
                $(this).parent().next().toggleClass("appear");
                $(".close").toggleClass("block");
                $(".reply").toggleClass("none");
                
            })
        })
    });
</script>

</html>