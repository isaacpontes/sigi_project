<x-app-layout>
    <x-slot name="header">
        {{ __('Church') . " - " . $church->name }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-6">
        <label>
            <strong>Nome: </strong>
            {{ $church->name }}
        </label>
        <br>
        <label>
            <strong>Email: </strong>
            {{ $church->email }}
        </label>
        <br>
        <label>
            <strong>CNPJ: </strong>
            {{ $church->cnpj }}
        </label>
        <br>
        <label>
            <strong>Telefone: </strong>
            {{ $church->phone }}
        </label>
        <br>
        <hr>
        <a href="{{ route('home') }}">
            <button type="button" class="btn btn-light float-right">Voltar</button>
        </a>
    </div>

</x-app-layout>
