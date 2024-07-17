<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')
        @yield('styles')
    </head>
    <body>
        <header>
            <nav role="navigation">
                <div id="menuToggle">
                    <!--
                    A fake / hidden checkbox is used as click reciever,
                    so you can use the :checked selector on it.
                    -->
                    <input type="checkbox" />

                    <!--
                    Some spans to act as a hamburger.

                    They are acting like a real hamburger,
                    not that McDonalds stuff.
                    -->
                    <span></span>
                    <span></span>
                    <span></span>

                    <!--
                    Too bad the menu has to be inside of the button
                    but hey, it's pure CSS magic.
                    -->
                    <ul id="menu">
                        <li class="{{ request()->is('/') ? 'active' : '' }}">
                            <a href="/">PFP Builder</a>
                        </li>
                        <li class="{{ request()->is('nft-gallery') ? 'active' : '' }}">
                            <a href="/nft-gallery">NFT Gallery</a>
                        </li>
                        @if(config('app.wl_checker_enabled'))
                        <li class="{{ request()->is('wl-checker') ? 'active' : '' }}">
                            <a href="/wl-checker">WL checker</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <div class="icons">
                <a href="{{ config('app.twitter_url')  }}" target="_blank"><img src="{{url('/images/twitter.svg')}}" alt="X Logo"></a>
                <a href="{{ config('app.discord_url')  }}" target="_blank"><img src="{{url('/images/discord.svg')}}" alt="Discord Logo"></a>
            </div>
            <div class="copyright">© {{ config('app.name')  }} {{ now()->year }}</div>
        </footer>

        <canvas id="canvas"></canvas>

        @vite('resources/js/app.js')
        @yield('scripts')
    </body>
</html>
