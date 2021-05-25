<?php
$url = url()->previous();
?>
@extends("layout")
@section("content")
<main>
    <a href="{{$url}}" class="back-btn"><i class="fas fa-arrow-left" ></i>前のページへ戻る</a>
    <article class="user-card">
        <h1 class="page-title">User Page</h1>
        <div class="user-image"></div>
        <table class="user-table">
            <tr>
                <td>User Name(Apelido) : {{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td>Mail Adress : {{ Auth::user()->email }}</td>
            </tr>
        </table>
    </article>
</main>
@endsection