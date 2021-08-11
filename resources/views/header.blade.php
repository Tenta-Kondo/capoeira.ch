<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous" />
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="{{asset('js/style.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Document</title>
</head>

<body>
    <header>

        <div class="jumbotron">
            <h1>Capoeira.ch</h1>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- <h1 style=" font-family: 'Quicksand', sans-serif;">Nao pode parar</h1> -->
            <div class="user-info" style="position:relative;">
                <a class="user-data btn-simple dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> USER NAME : <?php
                                                                                                                                                                                            if (empty(Auth::user())) {
                                                                                                                                                                                                echo "guest";
                                                                                                                                                                                            } else {
                                                                                                                                                                                                echo  Auth::user()->name;
                                                                                                                                                                                            }
                                                                                                                                                                                            ?></a>


                <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> -->
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="/user-page" class="btn-simple dropdown-item">UserInfo</a>
                </div>

            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <h2 class="btn-simple"><a href="/">Site Top</a></h2>
                    </li>
                    <li class="nav-item">
                        <h2 class="btn-simple"><a href="/create">Thread Create</a></h2>
                    </li>
                    <?php
                    $classA = "";
                    $classB = "";
                    if (!empty(Auth::user())) {
                        $classA = "block";
                        $classB = "none";
                    } else {
                        $classA = "none";
                        $classB = "block";
                    }
                    ?>
                    <li class="<?php echo $classA ?> nav-item">
                        <h2 class="btn-simple"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a></h2>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li class="<?php echo $classB ?> nav-item">
                        <h2 class="btn-simple"><a href="/login">Login</a></h2>
                    </li>
                </ul>
            </div>


        </nav>
    </header>