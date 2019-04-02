@extends('auth.layout')

@section('content')

    <div class="card-header card-header-primary">
        <h4 class="card-title">Авторизация</h4>
        <p class="card-category">Заполните форму</p>
    </div>
    <div class="card-body">
        <form method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group bmd-form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="bmd-label-floating">Email</label>
                        <input name="email" type="email" class="form-control">
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group bmd-form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label class="bmd-label-floating">Пароль</label>
                        <input name="password" type="password" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group bmd-form-group form-check">
                        <label class="form-check-label">
                            <input name="remember" type="checkbox" class="form-check-input" checked="checked" value="1" />
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                            Запомнить
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 text-danger">
                    @if ($errors->has('username'))
                        <strong>{{ $errors->first('username') }}</strong>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Войти</button>
            <div class="clearfix"></div>
        </form>
        <div class="row">
            <div class="col-md-4">
                <a href="register" class="btn btn-primary btn-round">Регистрация</a>
            </div>
        </div>
    </div>

    <style>
        .form-check {
            margin-top: 18px;
        }
    </style>

@endsection
