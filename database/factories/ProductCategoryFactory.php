<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories= ['دسته بندی 1','دسته بندی 2','دسته بندی 3','دسته بندی 4','دسته بندی 5','دسته بندی 6'];
        return [
            'name' => $this->faker->randomElement($categories),
            'detail' => $this->faker->text,
            'parent_id' => $this->faker->numberBetween(0,5),
            'photo' => null,
            'slug' => $this->faker->slug,
        ];
    }
}
