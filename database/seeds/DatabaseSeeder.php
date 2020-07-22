<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ChurchTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CongregationTableSeeder::class);
        $this->call(ClassroomTableSeeder::class);
        $this->call(MemberTableSeeder::class);
        $this->call(AccountTableSeeder::class);
        $this->call(IncomeCategoryTableSeeder::class);
        $this->call(ExpenseCategoryTableSeeder::class);
    }
}
