<x-app-layout>
    <x-slot name="header">
        {{ __('Account') . " - " . $account->name }}
    </x-slot>

    <div class="col-md-6">
        <label><strong>Nome:</strong> {{ $account->name }}</label><br>
        <label><strong>Saldo Atual:</strong> R$ {{ number_format($account->balance/100, 2, ',', '.') }}</label><br>
        <label><strong>Informações Adicionais:</strong> {{ $account->add_info }}</label><br>
        <label><strong>Igreja:</strong> {{ $account->church->name }}</label><br>
        <hr>
        <a href="{{ route('dashboard.accounts.index') }}">
            <button type="button" class="btn btn-light float-right">Voltar</button>
        </a>
    </div>

</x-app-layout>

