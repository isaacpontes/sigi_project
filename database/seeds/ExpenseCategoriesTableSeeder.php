<?php

namespace Database\Seeders;

use App\ExpenseCategory;
use Illuminate\Database\Seeder;

class ExpenseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpenseCategory::factory(49)->create();
    }
}
