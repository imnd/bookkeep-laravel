@extends('layout')

@section('content')

    <?php
    $bodyClass = 'invoices';
    $pageTitle = 'Фактуры';
    ?>
    <invoice-component></invoice-component>

@endsection
