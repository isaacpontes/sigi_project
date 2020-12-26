<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('dashboard') }}">
                    <i class="fa fa-home fa-fw mx-1" ></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('dashboard.appointments.index') }}">
                    <i class="fa fa-calendar-check fa-fw mx-1" ></i>
                    Compromissos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('dashboard.members.index') }}">
                    <i class="fa fa-users fa-fw mx-1" ></i>
                    Membros
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('dashboard.congregations.index') }}">
                    <i class="fa fa-place-of-worship fa-fw mx-1" ></i>
                    Congregações
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('dashboard.classrooms.index') }}">
                    <i class="fa fa-chalkboard-teacher fa-fw mx-1" ></i>
                    Classes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('dashboard.events.index') }}">
                    <i class="fa fa-calendar-alt fa-fw mx-1" ></i>
                    Eventos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('dashboard.accounts.index') }}">
                    <i class="fa fa-wallet fa-fw mx-1" ></i>
                    Contas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark ml-4" href="{{ route('dashboard.incomes.index') }}">
                    <i class="fa fa-angle-right fa-fw mx-1"></i>
                    Receitas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark ml-4" href="{{ route('dashboard.expenses.index') }}">
                    <i class="fa fa-angle-right fa-fw mx-1"></i>
                    Despesas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('dashboard.income_categories.index') }}">
                    <i class="fa fa-angle-right fa-fw mx-1"></i>
                    Categorias de Receitas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('dashboard.expense_categories.index') }}">
                    <i class="fa fa-angle-right fa-fw mx-1"></i>
                    Categorias de Despesas
                </a>
            </li>
        </ul>
    </div>
</nav>
