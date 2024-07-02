<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pizza Rhinos - @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')
        @yield('styles')
    </head>
    <body class="container mx-auto">
        <header></header>

        <main>
            @yield('content')
        </main>

        <footer>
            <a href="https://x.com/" target="_blank"><img src="{{url('/images/twitter.svg')}}" alt="X Logo"></a>
            <a href="https://discord.com/" target="_blank"><img src="{{url('/images/discord.svg')}}" alt="Discord Logo"></a>
        </footer>

        <canvas id="canvas"></canvas>

        @vite('resources/js/app.js')
        @yield('scripts')
    </body>
</html>
