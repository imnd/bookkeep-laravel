<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/app.css" />
    <title>{{ $pageTitle ?? 'Бухгалтерия' }}</title>
</head>

<body>
    <div class="main" id="menu">
        <ul class="top_menu">
            <li class="invoices left"><a href="/invoices/items">фактуры</a></li>
            <li class="contracts"><a href="/contracts/items">договоры и контракты</a></li>
            <li class="purchases"><a href="/purchases/items">закупки</a></li>
            <li class="articles"><a href="/articles/items">товары</a></li>
            <li class="clients"><a href="/clients/items">клиенты</a></li>
            <li class="bills"><a href="/bills/items">платежи</a></li>
            <li class="settings"><a href="/settings">администрирование</a></li>
            <li class="index/logout right"><a href="/index/logout">выйти</a></li>
        </ul>
        <?php
        $route = app('request')->route();
        $actionName = $route->getActionName();
        if ('Closure' !== $actionName) {
            $modelName = lcfirst($route->getController()->getModelName());
            ?>
            <ul class="main_menu">
            @foreach ([
                'items' => 'список',
                'create' => 'добавить',
            ] as $action => $caption)
                @if ($action!==$actionName)
                    <li class="items left"><a href="/{{ $modelName }}/{{ $action }}">{{ $caption }}</a></li>
                @endif
            @endforeach
            </ul>
        <?php }?>
    </div>
    <div class="clear"></div>
    <div id="container">