<?php

namespace Database\Factories;

use App\Church;
use App\Congregation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CongregationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Congregation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Congregação ' . $this->faker->text(10),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'add_info' => $this->faker->text(200),
            'church_id' => $this->faker->randomElement(Church::all()->pluck('id')->toArray())
        ];
    }
}
