<?php

namespace Database\Factories;

use App\Models\comment;
use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'=>$this->faker->sentence,
            'auther'=>$this->faker->sentence,
            'post_id'=>post::all()->random()
        ];
    }
}
