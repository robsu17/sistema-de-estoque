<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Estoque</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body style="min-height: 100vh">
<div style="height: 100%">
    <x-layout.navbar />
    @yield('content')
</div>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
