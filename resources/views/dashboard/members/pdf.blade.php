<div role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Membros</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-md">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="col">Congregação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member)
            <tr>
                <th scope="row">{{ $member->id }}</th>
                <td>{{ $member->name }}</td>
                <td>{{ $member->phone }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->congregation->name }}</td>
            </tr>
            @endforeach
            </tbody>
            </table>

        </div>
    </div>
</div>
