<?php

namespace Database\Seeders;

use App\IncomeCategory;
use Illuminate\Database\Seeder;

class IncomeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncomeCategory::factory(49)->create();
    }
}
