<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    @yield('js')

    <!-- Styles -->
    @yield('css')
</head>
<body class="min-h-screen bg-gray-200">

  @yield('nav')

  @yield('content')

  @yield('footer')

</body>
</html>