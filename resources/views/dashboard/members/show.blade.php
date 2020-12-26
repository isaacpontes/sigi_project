<x-app-layout>
    <x-slot name="header">
        {{ __('Member') . " - " . $member->name }}
    </x-slot>

    <div class="col-md-6">
        <label>
            <strong>Nome: </strong>
            {{ $member->name }}
        </label>
        <br>
        <label>
            <strong>Gênero: </strong>
            {{ $member->gender }}
        </label>
        <br>
        <label>
            <strong>Data de Nascimento: </strong>
            {{ $member->birth }}
        </label>
        <br>
        <label>
            <strong>Email: </strong>
            {{ $member->email }}
        </label>
        <br>
        <label>
            <strong>Telefone: </strong>
            {{ $member->phone }}
        </label>
        <br>
        <label>
            <strong>Endereço: </strong>
            {{ $member->address }}
        </label>
        <br>
        <label>
            <strong>Data de Admissão: </strong>
            {{ $member->admission }}
        </label>
        <br>
        @isset($member->demission)
            <label>
                <strong>Data de Desligamento: </strong>
                {{ $member->demission }}
            </label>
            <br>
        @endisset
        @isset($member->classroom)
            <label>
                <strong>Classe: </strong>
                {{ $member->classroom->name }}
            </label>
            <br>
        @endisset
        <label>
            <strong>Congregação: </strong>
            {{ $member->congregation->name }}
        </label>
        <br>
        <hr>
        <a href="{{ route('dashboard.members.index') }}">
            <button type="button" class="btn btn-light float-right">Voltar</button>
        </a>

    </div>

</x-app-layout>
