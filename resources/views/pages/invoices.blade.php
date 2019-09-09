@extends('layout')

@section('content')

    <?php
    $pageAction = 'invoices';
    $pageTitle = 'Фактуры';
    ?>
    <invoice-component />

@endsection
