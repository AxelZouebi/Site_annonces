<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Site d'annonce en ligne optimisé pour le click & collect partout en france">
        <title>
            CNC
        </title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.2/dist/alpine.min.js" defer></script>
    </head>
    <body>
      <div class="">
        @include('partials.navbar')
      <livewire:alert />
        @yield('content')
      </div>
        @livewireScripts
    </body>
</html>