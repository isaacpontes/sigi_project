<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse overflow-auto">
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.appointments.index') }}">
                    <i class="fa fa-tasks fa-fw mx-1" ></i>
                    Compromissos
                </a>
            </li>
            @if (Auth::user()->members_admin)
                <h6 class="ms-2 mt-3 mb-2 text-dark">SECRETARIA</h6>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.membership.events.index') }}">
                        <i class="fa fa-calendar fa-fw mx-1" ></i>
                        Eventos
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.membership.events.index') }}">
                        <i class="fa fa-calendar-alt fa-fw mx-1" ></i>
                        Eventos
                    </a>
                </li> --}}
            @endif
            @if (Auth::user()->finances_admin)
            <h6 class="ms-2 mt-3 mb-2 text-dark">TESOURARIA</h6>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.finances.accounts.index') }}">
                        <i class="fa fa-wallet fa-fw mx-1" ></i>
                        Contas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.finances.incomes.index') }}">
                        <i class="fa fa-plus fa-fw mx-1"></i>
                        Receitas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.finances.expenses.index') }}">
                        <i class="fa fa-minus fa-fw mx-1"></i>
                        Despesas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.finances.categories') }}">
                        <i class="fa fa-list fa-fw mx-1" ></i>
                        Categorias
                    </a>
                </li>
            @endif
            @if (Auth::user()->church_admin)
            <h6 class="ms-2 mt-3 mb-2 text-dark">ADMINISTRAÇÃO</h6>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route( 'dashboard.church.show' ) }}">
                        <i class="fa fa-church fa-fw mx-1" ></i>
                        Igreja
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
