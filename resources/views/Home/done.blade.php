<?php
$url = url()->previous();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <p style="margin-top: 5vh;margin-bottom:2vh;">コメントを投稿しました。</p>
    <a href="{{$url}}" class="choises">スレッドへ戻る-></a>
    <a href="/top" class="choises" style="margin-left: 15px;">スレッド一覧へ-></a>
</body>
</html>