<?php

namespace Database\Factories;

use App\Account;
use App\Church;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(8) . " Account",
            'balance' => $this->faker->numberBetween(1000, 99999999),
            'add_info' => $this->faker->text(128),
            'church_id' => $this->faker->randomElement(Church::all()->pluck('id')->toArray())
        ];
    }
}
