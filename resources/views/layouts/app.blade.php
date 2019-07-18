<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @include('feed::links')

    <!-- Scripts -->
    @yield('js')

    <!-- Styles -->
    @yield('css')
</head>
<body id="body" class="min-h-screen theme-light bg-background-secondary relative flex flex-col">


  @yield('nav')

  <main class="flex-grow">
    @yield('content')
  </main>

  @yield('footer')

  
  @include('cookieConsent::index')

</body>
</html>