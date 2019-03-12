@extends('auth.layout')

@section('content')

    <div class="card-header card-header-primary">
        <h4 class="card-title">Регистрация</h4>
        <p class="card-category">Заполните форму</p>
    </div>
    <div class="card-body">
        <form method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group bmd-form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label class="bmd-label-floating">Имя</label>
                        <input name="username" type="text" class="form-control">
                    </div>
                </div>
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
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group bmd-form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="bmd-label-floating">Пароль</label>
                        <input name="password" type="password" class="form-control" />
                        @if ($errors->has('password'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group bmd-form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="bmd-label-floating">Пароль снова</label>
                        <input name="password_confirmation" type="password" class="form-control" />
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row error">
                <div class="col-md-3">
                    {{ $error ?? '' }}
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Зарегистрироваться</button>
            <div class="clearfix"></div>
        </form>
        <div class="row">
            <div class="col-md-4">
                <a href="login" class="btn btn-primary btn-round">Войти</a>
            </div>
        </div>
    </div>

    <style>
        .btn.btn-primary.pull-right {
            margin-top: 24px;
        }
    </style>
@endsection
