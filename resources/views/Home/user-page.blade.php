@extends("layout")
@section("content")
<main>
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