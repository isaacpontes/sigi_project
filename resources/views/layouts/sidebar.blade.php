<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <div class="mx-5 my-3 text-center">
            <h5>{{ Auth::user()->name }}</h5>
            <a href="{{ route('dashboard.users.show', Auth::user()->id) }}" class="text-secondary text-decoration-none">
                Ver Perfil
            </a>
        </div>
        <ul class="nav flex-column px-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.start') }}">
                    <i class="fa fa-home fa-fw mx-1" ></i>
                    Início
                </a>
            </li>
            @if (Auth::user()->members_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.membership.members.index') }}">
                        <i class="fa fa-users fa-fw mx-1" ></i>
                        Membros
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.membership.classrooms.index') }}">
                        <i class="fa fa-chalkboard-teacher fa-fw mx-1" ></i>
                        Classes
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.events.index') }}">
                        <i class="fa fa-calendar-alt fa-fw mx-1" ></i>
                        Eventos
                    </a>
                </li> --}}
            @endif
            @if (Auth::user()->finances_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.finances.accounts.index') }}">
                        <i class="fa fa-wallet fa-fw mx-1" ></i>
                        Contas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.finances.categories') }}">
                        <i class="fa fa-dollar fa-fw mx-1" ></i>
                        Lançamentos
                    </a>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link ms-3" href="{{ route('dashboard.finances.incomes.index') }}">
                                <i class="fa fa-angle-right fa-fw mx-1"></i>
                                Receitas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-3" href="{{ route('dashboard.finances.expenses.index') }}">
                                <i class="fa fa-angle-right fa-fw mx-1"></i>
                                Despesas
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->church_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route( 'dashboard.church.show' ) }}">
                        <i class="fa fa-church fa-fw mx-1" ></i>
                        Igreja
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route( 'dashboard.congregations.index' ) }}">
                        <i class="fa fa-sitemap fa-fw mx-1" ></i>
                        Congregações
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route( 'dashboard.users.index' ) }}">
                        <i class="fa fa-users-cog fa-fw mx-1" ></i>
                        Usuários
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
