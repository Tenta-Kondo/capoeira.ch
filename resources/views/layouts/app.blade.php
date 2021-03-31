<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">

    <script src="{{asset('js/jquery.fademover.js')}}"></script>
   

</head>

<body class="fadeout">
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    <script>
        $(function() {
            $(".tag").click(function() {
                $(".login-data").toggleClass("position");
            })
        })

        // $(window).on('load', function() {
        //     $('body').addClass('fadeout');
        // });
        // $(function() {
        //     // ハッシュリンク(#)と別ウィンドウでページを開く場合はスルー
        //     $('a:not([href^="#"]):not([target])').on('click', function(e) {
        //         e.preventDefault(); // ナビゲートをキャンセル
        //         url = $(this).attr('href'); // 遷移先のURLを取得
        //         if (url !== '') {
        //             $('body').addClass('fadeout'); // bodyに class="fadeout"を挿入
        //             setTimeout(function() {
        //                 window.location = url; // 0.8秒後に取得したURLに遷移
        //             }, 800);
        //         }
        //         return false;
        //     });
        // });
        $(function() {
            $('body').fadeMover();
            $('.sbox').fadeMover({'inDelay': 500});
        });
    </script>
</body>


</html>