<?php

namespace Database\Factories;

use App\Church;
use App\ExpenseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExpenseCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Despesas de ' . $this->faker->text(8),
            'church_id' => $this->faker->randomElement(Church::all()->pluck('id')->toArray())
        ];
    }
}
