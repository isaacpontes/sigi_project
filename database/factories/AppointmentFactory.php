<?php

namespace Database\Factories;

use App\Appointment;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Compromisso ' . $this->faker->text(16),
            'happens_at' => $this->faker->dateTimeThisYear,
            'completed' => false,
            'add_info' => $this->faker->text(200),
            'user_id' => $this->faker->randomElement(User::all()->pluck('id')->toArray())
        ];
    }
}
