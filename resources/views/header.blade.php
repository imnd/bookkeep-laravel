<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/styles.css" />
        <meta name="csrf-token" value="{{ csrf_token() }}" />
        <title>{{ $pageTitle ?? 'Бухгалтерия' }}</title>
    </head>
    <body class="{{ $bodyClass ?? '' }}">
        <ul class="main top_menu" id="menu">
            <li class="invoices left"><a href="/invoices/list">фактуры</a></li>
            <li class="contracts"><a href="/contracts/list">договоры и контракты</a></li>
            <li class="purchases"><a href="/purchases/list">закупки</a></li>
            <li class="articles"><a href="/articles/list">товары</a></li>
            <li class="clients"><a href="/clients/list">клиенты</a></li>
            <li class="bills"><a href="/bills/list">платежи</a></li>
            <li class="settings"><a href="/settings">администрирование</a></li>
            <li class="index/logout right"><a href="/index/logout">выйти</a></li>
        </ul>
        <div class="clear"></div>
        <div id="container">
            <div class="wrapper">
