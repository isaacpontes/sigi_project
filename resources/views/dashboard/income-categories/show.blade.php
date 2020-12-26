<x-app-layout>
    <x-slot name="header">
        {{ __('Income Category') . " - " . $income_category->name }}
    </x-slot>

    <div class="col-md-6">
        <label>{{ $income_category->add_info }}</label><br>
        <hr>
        <a href="{{ route('dashboard.income_categories.index') }}">
            <button type="button" class="btn btn-light float-right">Voltar</button>
        </a>
    </div>

</x-app-layout>
