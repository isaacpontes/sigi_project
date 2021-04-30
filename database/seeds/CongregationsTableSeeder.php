<?php

namespace Database\Seeders;

use App\Congregation;
use Illuminate\Database\Seeder;

class CongregationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Congregation::factory(49)->create();
    }
}
