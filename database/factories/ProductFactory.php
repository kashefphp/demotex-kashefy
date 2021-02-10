<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1,20),
            'name' => $this->faker->name,
            'details' => $this->faker->text,
            'photos' => null,
            'price' => $this->faker->numberBetween(100,99999),
            'discount' => $this->faker->numberBetween(0,100),
            'slug' => $this->faker->slug,
        ];
    }
}
