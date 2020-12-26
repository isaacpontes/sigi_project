<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
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

                    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">

                        <!-- Page Heading -->
                        <header class="">
                            <div class="d-flex p-2 mb-3 border-bottom">
                                <h1 class="h2">{{ $header }}</h1>
                            </div>
                        </header>

                        <!-- Page Content -->
                        <div class="min-vh-100">
                            {{ $slot }}
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
