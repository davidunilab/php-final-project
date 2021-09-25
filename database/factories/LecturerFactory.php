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
            "img"=> "https://source.unsplash.com/random/200x200?face&sig=".$this->faker->numberBetween(1,1000),
            "phone"=> $this->faker->phoneNumber(),
            "cv"=> $this->faker->url(),
            "about"=> $this->faker->text(850),
            "source"=> $this->faker->url(),
            "academicrank"=> 0,
            "personalrank"=> 0
        ];
    }
}
