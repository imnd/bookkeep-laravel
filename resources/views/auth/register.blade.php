@extends('auth.layout')

@section('content')

    <h4>Регистрация</h4>

    <form method="post">
        {{ csrf_field() }}
        <div class="row">
            <input name="username" placeholder="логин"/>
        </div>
        <div class="row">
            <input name="email" placeholder="email"/>
        </div>
        <div class="row">
            <input name="password" placeholder="пароль" type="password" />
        </div>
        <div class="row">
            <input name="password_confirm" placeholder="подтверждение пароля" type="password" />
        </div>
        <div class="error">
            <?=$error ?? ''?>
        </div>
        <input type="submit" value="зарегаться"/>
    </form>

@endsection
