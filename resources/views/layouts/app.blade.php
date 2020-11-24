<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow-sm navbar-expand-md">
            @guest
                <a class="navbar-brand bg-dark" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            @else
                <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('dashboard.main') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            @endguest
            <div class="container-fluid">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto px-3">
                        {{-- <li class="nav-item text-nowrap">
                            <a class="nav-link" href="{{ route('dashboard.users.show', Auth::user()) }}">
                                Meu Perfil
                            </a>
                        </li>
                        <li class="nav-item text-nowrap">
                            <a class="nav-link" href="{{ route('dashboard.churches.show', Auth::user()->church) }}">
                                Perfil da Igreja
                            </a>
                        </li> --}}
                        <li class="nav-item text-nowrap">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                        {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('dashboard.users.show', Auth::user()) }}">
                                Ver Meu Perfil
                            </a>

                            <a class="dropdown-item" href="{{ route('dashboard.users.edit', Auth::user()) }}">
                                Editar Meu Perfil
                            </a>

                            <a class="dropdown-item" href="{{ route('dashboard.churches.show', Auth::user()->church) }}">
                                Ver Perfil da Igreja
                            </a>

                            <a class="dropdown-item" href="{{ route('dashboard.churches.edit', Auth::user()->church) }}">
                                Editar Perfil da Igreja
                            </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li> --}}
                    </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!-- Left Sidebar -->
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="/dashboard/principal">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="/dashboard/membros">Membros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="/dashboard/congregacoes">Congregações</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="/dashboard/classes">Classes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="/dashboard/eventos">Eventos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="/dashboard/contas">Contas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="/dashboard/receitas">Receitas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="/dashboard/despesas">Despesas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="/dashboard/categorias-receita">Categorias de Receitas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="/dashboard/categorias-despesa">Categorias de Despesas</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                @yield('content')

            </div>

            {{-- @guest
                <div class="row justify-content-center">
                    <main role="main" class="col-md-8 px-4">
                        @yield('content')
                    </main>
                </div>
            @endguest --}}
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"> </script>
    @yield('scripts')
</body>
</html>
