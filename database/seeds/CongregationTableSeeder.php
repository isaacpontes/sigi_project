<?php

use Illuminate\Database\Seeder;
use App\Church;
use App\Congregation;

class CongregationTableSeeder extends Seeder
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
        $church2 = Church::where('name', 'Igreja 2')->first();

        Congregation::create([
            'name' => 'Congregação da Igreja 1',
            'phone' => '1234-5678',
            'address' => 'Endereço',
            'church_id' => $church1->id
        ]);

        Congregation::create([
            'name' => 'Congregação da Igreja 2',
            'phone' => '8765-4321',
            'address' => 'Endereço',
            'church_id' => $church2->id
        ]);
    }
}
