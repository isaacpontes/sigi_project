<?php

namespace Database\Seeders;

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
        $this->call(ChurchesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CongregationsTableSeeder::class);
        $this->call(ClassroomsTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(AppointmentsTableSeeder::class);
        $this->call(AccountsTableSeeder::class);
        $this->call(IncomeCategoriesTableSeeder::class);
        $this->call(ExpenseCategoriesTableSeeder::class);
        $this->call(IncomesTableSeeder::class);
        $this->call(ExpensesTableSeeder::class);
    }
}
