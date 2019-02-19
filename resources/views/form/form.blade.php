@extends('layout')

@section('content')

<p>Поля с <span class="error">*</span> обязательны к заполнению.</p>

<div class="error row"><?=$message ?? ''?></div>

<div class="form">

    @yield('content')

</div>

@endsection
