<?php

namespace Database\Seeders;

use App\Income;
use Illuminate\Database\Seeder;

class IncomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Income::factory(700)->create();
    }
}
