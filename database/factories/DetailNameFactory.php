<?php

namespace Database\Factories;

use App\Models\DetailName;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailNameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailName::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'detail' => $this->faker->text,
        ];
    }
}
