<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - Meu Estoque</title>
  @vite('resources/css/app.css')
</head>

<body class="h-screen bg-gray-400 flex justify-center items-center">
  @yield('content')
</body>

</html>