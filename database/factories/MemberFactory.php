<?php

namespace Database\Factories;

use App\Congregation;
use App\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $congregation = $this->faker->randomElement(Congregation::all());
        $congregation_id = $congregation->id;
        $church_id = $congregation->church_id;

        return [
            'name' => $this->faker->name($gender),
            'gender' => ($gender === 'male' ? 0 : 1),
            'birth' => $this->faker->dateTimeBetween('-80 years', '-12 years'),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'admission' => $this->faker->dateTimeThisDecade,
            'congregation_id' => $congregation_id,
            'church_id' => $church_id
        ];
    }
}
