<?php

namespace Database\Factories;

use App\Models\Personal;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "givepoints" => $this->faker->numberBetween(1,10),
            "isgood" => $this->faker->numberBetween(1,10),
            "hastact" => $this->faker->numberBetween(1,10),
            "isorganised" => $this->faker->numberBetween(1,10),
            "isempatic" => $this->faker->numberBetween(1,10),
            "islovely" => $this->faker->numberBetween(1,10),
            "lecturer_id" => $this->faker->numberBetween(1,10),
            "user_id" => $this->faker->numberBetween(1,5),
        ];
    }
}
