<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'photo_id'=> $this->faker->numberBetween($min= 1, $max= 2),
            'brand_id'=> $this->faker->numberBetween($min= 1, $max= 2),
            'product_category_id'=>$this->faker->numberBetween($min= 1, $max= 3),
            'name'=>$this->faker->word,
            'body'=>$this->faker->realText($maxNbChars=200, $indexSize=2),
            'price'=>$this->faker->numberBetween(5,65),
        ];
    }
}
