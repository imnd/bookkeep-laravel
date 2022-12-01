@extends('auth.layout')

@section('content')

    <div class="card-header card-header-primary">
        <h4 class="card-title">Authorization</h4>
        <p class="card-category">Fill the form</p>
    </div>
    <div class="card-body">
        <form method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="flex-column form-group bmd-form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="flex-row">
                            <label class="bmd-label-floating">Email</label>
                            <input name="email" type="email" class="form-control">
                        </div>
                        @if ($errors->has('email'))
                            <div class="text-danger clear pt-2">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group bmd-form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label class="bmd-label-floating">Password</label>
                        <input name="password" type="password" class="form-control" />
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
            <button type="submit" class="btn btn-primary pull-right">Login</button>
            <div class="clearfix"></div>
        </form>
    </div>

@endsection
