@extends("layout") @section("content")<main>
    <div class="sitetop-header  shadow-1-strong">
        <div class="sitetop-title">
            <h2>Capoeira.ch</h2>
        </div>
        <div class="sitetop-nav">
            <p>Capoeira.chは、カポエイリスタによるカポエイリスタの為の掲示板です。<br> roda情報・情報共有・動画へのアドバイス・雑談etc...<br>
            所属団体不問です。<br> 団体の壁を越えて繋がりましょう！<br>
            まずは<a href="/register" style="border-bottom: solid 0.2px black;">ココから</a>会員登録！
        </div>
    </div>
    <div class="toplink-group">
        <div class="nav-link toplink-thread"><a href="/top">
                <h4>Go To Thread</h4>
            </a></div>
        <div class="nav-link toplink-create"><a href="/register">
                <h4>Create Account</h4>
            </a></div>

        <div class="nav-link toplink-subsc"><a href="/user-page">
                <h4>Start Subscription</h4>
            </a></div>
    </div>
    <hr width="70%" style="margin:0 auto;margin-top:50px">
    <div></div>
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
</script>
</body>
</html>@endsection