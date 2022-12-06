<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

        <!-- Fonts and icons -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="/css/font-awesome.min.css">

        <!-- CSS Files -->
        <link href="/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
        <link href="/css/baseline.css" rel="stylesheet" />
        <link href="/css/app.css" rel="stylesheet" />

        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'apiToken' => $user->api_token ?? null,
            ]) !!};
        </script>

        <title>{{ 'Бухгалтерия' }}</title>
    </head>
    <body>
        <div class="wrapper">
