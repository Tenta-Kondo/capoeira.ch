<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="top-title">Capoeira.chへようこそ！</h1>
            <p>Capoeira.chは、アペリードとメールアドレスだけで登録出来る、
                <br>カポエイリスタによるカポエイリスタの為の無料掲示板です。<br>
                rodaやイベントの呼びかけ・自分の動画へのアドバイス募集・情報共有・雑談etc.. <br>
                所属団体不問です。団体の壁を越えて気軽に繋がりましょう！
            </p>
            <button class="btn" onclick="location.href='/register'">アカウント作成</button>
            <button class="btn" onclick="location.href='/login'">ログイン</button>
        </div>
    </div>
</body>

</html>