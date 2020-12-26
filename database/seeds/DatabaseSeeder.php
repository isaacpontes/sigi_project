<?php

namespace Database\Seeders;

use App\Account;
use App\Appointment;
use App\Church;
use App\Congregation;
use App\Event;
use App\Expense;
use App\ExpenseCategory;
use App\Income;
use App\IncomeCategory;
use App\Member;
use App\User;
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
        $this->call(UsersTableSeeder::class);

        User::factory(14)->create();
        Congregation::factory(49)->create();
        Member::factory(700)->create();
        Event::factory(49)->create();
        Appointment::factory(70)->create();
        Account::factory(14)->create();
        IncomeCategory::factory(49)->create();
        ExpenseCategory::factory(49)->create();
        // Income::factory(700)->create();
        // Expense::factory(700)->create();

        // $this->call(RolesTableSeeder::class);
        // $this->call(CongregationTableSeeder::class);
        // $this->call(ClassroomTableSeeder::class);
        // $this->call(MemberTableSeeder::class);
        // $this->call(AccountTableSeeder::class);
        // $this->call(IncomeCategoryTableSeeder::class);
        // $this->call(ExpenseCategoryTableSeeder::class);
    }
}
