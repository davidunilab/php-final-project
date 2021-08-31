<?php

namespace Database\Factories;

use App\Models\Comments;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "comment"=>$this->faker->realText(),
            "user_id"=>$this->faker->numberBetween(1,5),
            "lecturer_id"=>$this->faker->numberBetween(1,5),
            "created_at"=>$this->faker->dateTimeBetween("-30 days",now()),
        ];
    }
}
