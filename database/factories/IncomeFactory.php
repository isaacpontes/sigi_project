<?php

namespace Database\Factories;

use App\Account;
use App\Church;
use App\Income;
use App\IncomeCategory;
use App\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Income::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $church = $this->faker->randomElement(Church::all());
        $account = $this->faker->randomElement(Account::where('church_id', $church->id)->get());
        $member = $this->faker->randomElement(Member::where('church_id', $church->id)->get());
        $income_category = $this->faker->randomElement(IncomeCategory::where('church_id', $church->id)->get());

        return [
            'name' => $this->faker->text(16),
            'value' => $this->faker->numberBetween(1,99999),
            'ref_date' => $this->faker->dateTimeThisYear(),
            'add_info' => $this->faker->text(200),
            'member_id' => $member->id,
            'income_category_id' => $income_category->id,
            'account_id' => $account->id,
            'church_id' => $church->id
        ];
    }
}
