<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow-sm">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('dashboard.start') }}">
        SiGI | Dashboard
    </a>

    {{-- <input class="form-control form-control w-100" type="text" placeholder="Pesquisar" aria-label="Search"> --}}

    <div class="d-flex">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="btn btn-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Logout') }}
                    </a>
                </form>
            </li>
        </ul>

        <button class="navbar-toggler me-3 d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</header>
