

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row" style="margin: 0 auto;">
            <div class="card col-8 col-md-12 col-sm-10">
                <h1 class="open-header">
                    Capoeira.chへようこそ！
                </h1>
                <p>Capoeira.chは、アペリードとメールアドレスで登録出来る掲示板です。<br>
                    まずは無料会員登録してみよう！
                </p>
                <div class="login-group">
                    <button type="button" onclick="location.href='/login'" class="btn btn-outline-success">LOGIN</button>
                    <button type="button" onclick="location.href='/register'" class="btn btn-outline-success">ACCOUNT CREATE</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>