<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tags = [
            'Finance',
            'Members',
            'Shoes',
            'Cakes',
            'Mobile',
            'Accounting',
            'Math'
        ];
        return [
            'name'=>$this->faker->randomElement($tags),
            'parent_id'=>$this->faker->numberBetween(1, 3)
            //
        ];
    }
}
