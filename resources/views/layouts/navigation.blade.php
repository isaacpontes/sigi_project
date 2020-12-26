<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ route('dashboard') }}">
        Painel de Controle
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 mx-md-1" type="text" placeholder="Pesquisar pelo Painel" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Logout') }}
                </a>
            </form>
        </li>
    </ul>
</nav>
