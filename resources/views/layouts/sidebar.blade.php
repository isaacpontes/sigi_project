<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.start') }}">
                    <i class="fa fa-home fa-fw mx-1" ></i>
                    Início
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.congregations.index') }}">
                    <i class="fa fa-place-of-worship fa-fw mx-1" ></i>
                    Congregações
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.classrooms.index') }}">
                    <i class="fa fa-chalkboard-teacher fa-fw mx-1" ></i>
                    Classes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.members.index') }}">
                    <i class="fa fa-users fa-fw mx-1" ></i>
                    Membros
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.events.index') }}">
                    <i class="fa fa-calendar-alt fa-fw mx-1" ></i>
                    Eventos
                </a>
            </li> --}}
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
            </li>
            <li class="nav-item">
                <a class="nav-link ms-4" href="{{ route('dashboard.finances.incomes.index') }}">
                    <i class="fa fa-angle-right fa-fw mx-1"></i>
                    Receitas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link ms-4" href="{{ route('dashboard.finances.expenses.index') }}">
                    <i class="fa fa-angle-right fa-fw mx-1"></i>
                    Despesas
                </a>
            </li>
        </ul>
    </div>
</nav>
