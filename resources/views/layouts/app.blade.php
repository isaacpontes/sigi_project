<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/5785dc88d0.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="app">
            @include('layouts.navigation')
            <div class="container-fluid">
                <div class="row">
                    <!-- Left Sidebar -->
                    @include('layouts.sidebar')

                    <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                        <!-- Page Heading -->
                        {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">{{ $header }}</h1>
                        </div> --}}

                        <!-- Page Content -->
                        <div class="app-content pt-4">
                            {{ $slot }}
                        </div>

                    </main>
                </div>

                <footer class="row bg-light px-4 py-2">
                    <div class="col-md-9 col-lg-10 offset-md-3 offset-lg-2">
                        <span class="text-dark">{{ __('Thanks for using SiGI.') }}</span>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
