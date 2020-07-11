<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <link rel="stylesheet" href="/css/app.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<div class="ui secondary pointing menu">
    <a class="{{ request()->is('home') ? 'active' : '' }} item" href="/home">Труднозатраты</a>
    <a class="{{ request()->is('report') ? 'active' : '' }} item" href="/report">Отчет</a>
    <a class="{{ request()->is('projects') ? 'active' : '' }} item" href="/projects">Проекты</a>
</div>
<div>
    @yield('content')
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
<script src="/js/app.js"></script>
</html>
