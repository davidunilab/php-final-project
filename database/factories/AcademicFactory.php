<?php

namespace Database\Factories;

use App\Models\Academic;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Academic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "diction" => $this->faker->numberBetween(1,10),
            "explain" => $this->faker->numberBetween(1,10),
            "involved" => $this->faker->numberBetween(1,10),
            "homeworkeasy" => $this->faker->numberBetween(1,10),
            "homeworkcount" => $this->faker->numberBetween(1,10),
            "communication" => $this->faker->numberBetween(1,10),
            "lecturer_id" => $this->faker->numberBetween(1,10),
            "user_id" => $this->faker->numberBetween(1,5),
        ];
    }
}
