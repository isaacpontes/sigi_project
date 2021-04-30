<?php

namespace Database\Factories;

use App\Account;
use App\Church;
use App\Expense;
use App\ExpenseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $church = $this->faker->randomElement(Church::all());
        $account = $this->faker->randomElement(Account::where('church_id', $church->id)->get());
        $expense_cateogory = $this->faker->randomElement(ExpenseCategory::where('church_id', $church->id)->get());

        return [
            'name' => $this->faker->text(16),
            'value' => $this->faker->numberBetween(1000,99999),
            'ref_date' => $this->faker->dateTimeThisYear(),
            'add_info' => $this->faker->text(200),
            'expense_category_id' => $expense_cateogory->id,
            'account_id' => $account->id,
            'church_id' => $church->id
        ];
    }
}
