<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
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
        //
        // User::truncate();
        // DB::table('role_user')->truncate();

        // $sys_adminRole = Role::where('name', 'sys_admin')->first();
        // $administradorRole = Role::where('name', 'Administrador')->first();
        // $tesoureiroRole = Role::where('name', 'Tesoureiro')->first();
        // $secretarioRole = Role::where('name', 'Secretário')->first();

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

        // $sys_admin->roles()->attach($sys_adminRole);
        // $administrador->roles()->attach($administradorRole);
        // $tesoureiro->roles()->attach($tesoureiroRole);
        // $secretario->roles()->attach($secretarioRole);

    }
}
