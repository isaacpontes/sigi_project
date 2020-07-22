<?php

use Illuminate\Database\Seeder;
use App\Church;
use App\ExpenseCategory;

class ExpenseCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $church1 = Church::where('name', 'Igreja 1')->first();

        ExpenseCategory::create([
            'name' => 'Energia Elétrica',
            'add_info' => 'Todos os gastos com fornecimento de energia elétrica.',
            'church_id' => $church1->id
        ]);

        ExpenseCategory::create([
            'name' => 'Imóveis',
            'add_info' => 'Aluguel e outros gastos relacionados a bens imóveis.',
            'church_id' => $church1->id
        ]);

        ExpenseCategory::create([
            'name' => 'Veículos',
            'add_info' => 'Combustível, manutenção e outros gastos com veículos.',
            'church_id' => $church1->id
        ]);
    }
}
