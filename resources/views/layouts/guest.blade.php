<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('styles')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('scripts')
    </head>

    <body class="d-flex h-100 text-center text-white bg-primary bg-gradient">
        <div class="cover-container d-flex w-100 h-100 min-vh-100 p-3 mx-auto flex-column">
            <header class="mb-auto">
                <div>
                    <a href="/" class="float-md-start fs-3 text-white text-decoration-none">SiGI</a>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        {{ $navlinks }}
                    </nav>
                </div>
            </header>

            <main class="px-3">
                {{ $slot }}
            </main>

            <footer class="mt-auto text-white-50">
                <p>
                    {{ __("welcome.footer_credit") }} <a href="#" class="text-white">Isaac Pontes</a>.
                </p>
            </footer>
        </div>
    </body>
</html>
