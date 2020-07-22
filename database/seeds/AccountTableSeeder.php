<?php

use Illuminate\Database\Seeder;
use App\Church;
use App\Account;

class AccountTableSeeder extends Seeder
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

        Account::create([
            'name' => 'Conta Principal',
            'balance' => '10000',
            'add_info' => 'Esta é a conta 1.',
            'church_id' => $church1->id
        ]);

        Account::create([
            'name' => 'Conta Secundária',
            'balance' => '5000',
            'add_info' => 'Esta é a conta 2.',
            'church_id' => $church1->id
        ]);
    }
}
