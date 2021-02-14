<x-app-layout>
    <x-slot name="header">
        {{ __('User') . " - " . $user->name }}
    </x-slot>

    <div class="col-6">
        <label>{{ $user->name }}</label><br>
        <label>{{ $user->email }}</label><br>
        <label>{{ $user->church->name }}</label><br>
        <hr>
        <a href="{{ route('home') }}">
            <button type="button" class="btn btn-light float-right">Voltar</button>
        </a>
    </div>

</x-app-layout>
