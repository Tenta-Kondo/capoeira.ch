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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">

</head>

<body>
    <div id="main">
        <div class="container-fluid">
            @yield('content')

        </div>
    </div>
    <script>
        $(function() {
            $(".tag").click(function() {
                $(".login-data").toggleClass("position");
            })
        })
        $(function() {
            $(".terms").click(function() {
                $(".modal-bg-terms").toggleClass("block");
            })
        })
        $(function() {
            $(".privacy").click(function() {
                $(".modal-bg-privacy").toggleClass("block");
            })
        })
        $(function() {
            $(".terms-close").click(function() {
                $(".modal-bg-terms").toggleClass("block");
            })
        })
       
        $(function() {
            $(".privacy-close").click(function() {
                $(".modal-bg-privacy").toggleClass("block");
            })
        })
    </script>
</body>

</html>