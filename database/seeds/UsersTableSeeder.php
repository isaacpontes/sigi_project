<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Church;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $church1 = Church::where('name', 'Igreja 1')->first();
        $church2 = Church::where('name', 'Igreja 2')->first();

        User::create([
            'name' => 'Sys Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('senha123'),
            'system_admin' => true,
            'church_admin' => true,
            'finances_admin' => true,
            'members_admin' => true,
            'church_id' => $church1->id
        ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'user1@email.com',
            'password' => Hash::make('senha123'),
            'system_admin' => false,
            'church_admin' => true,
            'finances_admin' => true,
            'members_admin' => true,
            'church_id' => $church2->id
        ]);

        User::create([
            'name' => 'Tesoureiro',
            'email' => 'user2@email.com',
            'password' => Hash::make('senha123'),
            'system_admin' => false,
            'church_admin' => false,
            'finances_admin' => true,
            'members_admin' => false,
            'church_id' => $church2->id
        ]);

        User::create([
            'name' => 'Secretário',
            'email' => 'user3@email.com',
            'password' => Hash::make('senha123'),
            'system_admin' => false,
            'church_admin' => false,
            'finances_admin' => false,
            'members_admin' => true,
            'church_id' => $church2->id
        ]);

        User::factory(7)->create();
    }
}
