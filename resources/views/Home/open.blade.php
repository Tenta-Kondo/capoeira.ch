

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
                <p>Capoeira.chは、アペリードとメールアドレスで登録出来る<br>
                    カポエイリスタによるカポエイリスタの為の掲示板です。<br>
                    roda情報・情報共有・動画へのアドバイス・雑談etc...<br>
                    所属団体不問です。<br>
                    団体の壁を越えて繋がりましょう！
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