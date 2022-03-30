<?php

namespace Database\Factories;

use App\Church;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChurchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Church::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Igreja ' . $this->faker->text(10),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'add_info' => $this->faker->text(200),
            // 'plan' => $this->faker->numberBetween(1,3),
            // 'expiration' => $this->faker->dateTimeBetween('-2 years', '+2 years')
        ];
    }
}
