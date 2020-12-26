<x-app-layout>
    <x-slot name="header">
        {{ __('Expense Category') . " - " . $expense_category->name }}
    </x-slot>

    <div class="col-md-6">
        <label>{{ $expense_category->add_info }}</label><br>
        <hr>
        <a href="{{ route('dashboard.expense_categories.index') }}">
            <button type="button" class="btn btn-light float-right">Voltar</button>
        </a>
    </div>

</x-app-layout>
