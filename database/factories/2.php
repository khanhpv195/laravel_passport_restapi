<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
            'name' => Str::random(10),
            'price' => 100,
            'avatar' => "https://media3.scdn.vn/img4/2022/03_10/9DhkyfI44DyVk7qnHZdS_simg_b5529c_250x250_maxb.jpg",
            "detail"=> Str::random(100)
        ];
    }

 
}
