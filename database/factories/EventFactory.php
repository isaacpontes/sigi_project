<?php

namespace Database\Factories;

use App\Church;
use App\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Evento ' . $this->faker->text(16),
            'description' => $this->faker->text(200),
            'happens_at' => $this->faker->dateTimeThisYear,
            'church_id' => $this->faker->randomElement(Church::all()->pluck('id')->toArray())
        ];
    }
}
