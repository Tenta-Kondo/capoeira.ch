<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/style.js')}}"></script>
    <title>Document</title>
</head>

<body>
    <header>

        <div class="header-container">
            <div class="user-data">
                <div class="user-name">USER NAME : {{Auth::user()->name}}</div>
                <div class="logout">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <h1 style="font-family: 'Dancing Script', cursive;color:white;">Capoeira.ch</h1>


        </div>
        <div class="nav">
            <h1 class="blog-title">Nao pode parar</h1>
            <ul>
                <li>
                    <h2 style="border-bottom: black solid 0.5px;"><a href="/top">HOMEへ</a></h2>
                </li>
                <li>
                    <h2 style="border-bottom: black solid 0.5px;"><a href="/create">スレッド作成</a></h2>
                </li>
            </ul>

        </div>
    </header>