<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="{{secure_asset('js/style.js')}}"></script>
    <script src="{{secure_asset('js/animsition.js')}}"></script>
    <link rel="stylesheet" href="{{secure_asset('css/animsition.css')}}">
    <title>Document</title>
</head>

<body class="animsition" data-animsition-in-class="fade-in-left-sm" data-animsition-in-duration="1000" data-animsition-out-class="fade-out-left-sm" data-animsition-out-duration="800">
    <header>

        <div class="header-container">

            <h1 style=" font-family: 'Quicksand', sans-serif;color:white;">Capoeira.ch</h1>


        </div>
        <div class="nav">
            <!-- <h1 style=" font-family: 'Quicksand', sans-serif;">Nao pode parar</h1> -->
            <div style="position:relative;">
                <p class="user-data btn-simple"> USER NAME : {{ Auth::user()->name }}<i id="down" class="fas fa-caret-down" style="margin-left: 5px;"></i><i id="up" class="fas fa-caret-up none" style="margin-left: 5px;"></i></p>

                <a class="logout-btn btn-simple" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a href="/user-page" class="btn-simple user-page-btn">UserPage</a>
            </div>
            <ul>
                <li>
                    <h2 class="btn-simple"><a href="/top">Home</a></h2>
                </li>
                <li>
                    <h2 class="btn-simple"><a href="/create">Thread Create</a></h2>
                </li>
            </ul>


        </div>
    </header>