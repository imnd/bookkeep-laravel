@extends('auth.layout')

@section('content')

    <h4>Авторизация</h4>

    <form method="post">
        {{ csrf_field() }}
        <div class="row">
            <input name="username" placeholder="логин"/>
        </div>
        <div class="row">
            <input name="password" placeholder="пароль" type="password" />
        </div>
        <div class="row">
            <input name="remember" type="checkbox" checked="checked" value="1" />&nbsp;<label>запомнить</label>
        </div>
        <div class="error">
            {{ $error ?? '' }}
        </div>
        <input type="submit" value="войти"/>&nbsp;&nbsp;
        <a href="/register">регистрация</a>
    </form>

@endsection
