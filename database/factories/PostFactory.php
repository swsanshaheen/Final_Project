<?php

namespace Database\Factories;

use App\Models\post;
use App\Models\category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;



class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence,
            'body'=>$this->faker->text,
            'feature_img'=>"12345678912345678912341625632092.jpg",
            'large_img'=>"12345678912345678912341625632092.jpg",
            'views'=>$this->faker->randomNumber(2) ,
            'shares'=>$this->faker->randomNumber(2) ,
            'category_id'=>category::all()->random(),
            'user_id'=>User::all()->random()
        ];
    }
}
