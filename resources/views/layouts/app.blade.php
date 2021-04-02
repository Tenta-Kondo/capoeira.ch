<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <script src="{{secure_asset('js/animsition.js')}}"></script>
    <link rel="stylesheet" href="{{secure_asset('css/animsition.css')}}">
</head>

<body>
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
    </script>
</body>

</html>