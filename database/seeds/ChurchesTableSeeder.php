<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Church;

class ChurchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Church::create([
            'name' => 'Igreja 1',
            'email' => 'igreja1@email.com',
            'phone' => 'phone1',
            // 'plan' => '1',
            // 'expiration' => '2024-01-01',
        ]);

        Church::create([
            'name' => 'Igreja 2',
            'email' => 'igreja2@email.com',
            'phone' => 'phone2',
            // 'plan' => '1',
            // 'expiration' => '2024-01-01',
        ]);

        Church::factory(1)->create();
    }
}
