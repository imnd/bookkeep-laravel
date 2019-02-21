@extends('layout')

@section('content')

<div id="app">
    <div class="panel panel-default">
        <div class="panel-heading">Товары</div>
        <div class="panel-body table-responsive">
            <router-view name="articlesIndex"></router-view>
        </div>
    </div>
</div>

@endsection