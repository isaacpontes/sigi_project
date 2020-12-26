<?php

namespace Database\Factories;

use App\Church;
use App\IncomeCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IncomeCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(8) . " Account",
            'church_id' => $this->faker->randomElement(Church::all()->pluck('id')->toArray())
        ];
    }
}
