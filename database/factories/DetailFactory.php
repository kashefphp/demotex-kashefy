<?php

namespace Database\Factories;

use App\Models\Detail;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Detail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $detail_type = ['App\Models\Product', 'App\Models\ProductCategory'];
        return [
            'key_id' => $this->faker->numberBetween(1, 10),
            'value' => $this->faker->name,
            'price' => $this->faker->numberBetween(10, 10000),
            'detailable_id' => $this->faker->numberBetween(1, 20),
            'detailable_type' => $this->faker->randomElement($detail_type),
        ];
    }
}
