<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 10000),
            "cate_id"=>1,
            'avatar' => $this->faker->imageUrl(400,400),
            "detail"=>$this->faker->paragraph()
        ];
    }
}
