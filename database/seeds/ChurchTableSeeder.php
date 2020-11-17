<?php

use Illuminate\Database\Seeder;
use App\Church;

class ChurchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //

        Church::create([
            'name' => 'Igreja 1',
            'email' => 'igreja1@email.com',
            'cnpj' => 'cnpj1',
            'phone' => 'phone1',
            'plan' => '1'
        ]);

        Church::create([
            'name' => 'Igreja 2',
            'email' => 'igreja2@email.com',
            'cnpj' => 'cnpj2',
            'phone' => 'phone2',
            'plan' => '1'
        ]);

        Church::create([
            'name' => 'Igreja 3',
            'email' => 'igreja3@email.com',
            'cnpj' => 'cnpj3',
            'phone' => 'phone3',
            'plan' => '1'
        ]);
    }
}
