<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'comment_id'=>$this->faker->numberBetween(1, 50),
            'user_id'=>$this->faker->numberBetween(1, 100),
            'is_active'=>$this->faker->numberBetween(0,1),
            'photo_id'=>$this->faker->numberBetween(1, 50),
            'body'=>$this->faker->realText(200, 2),
        ];
    }
}
