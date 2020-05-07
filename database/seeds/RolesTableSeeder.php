<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Role::truncate();

        Role::create(['name' => 'sys_admin']);
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Tesoureiro']);
        Role::create(['name' => 'Secretário']);
    }
}
