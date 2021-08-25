<?php

namespace Database\Factories;

use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LecturerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lecturer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            "name"=> $this->faker->name(),
            "email"=> $this->faker->unique()->safeEmail(),
            "img"=> $this->faker->imageUrl(),
            "phone"=> $this->faker->phoneNumber(),
            "cv"=> $this->faker->url(),
            "about"=> $this->faker->text(850),
            "academicrank"=> $this->faker->numberBetween(1,100),
            "personalrank"=> $this->faker->numberBetween(1,100)
        ];
    }
}
