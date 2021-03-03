<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase,
        WithFaker;


    public function testCreate()
    {
        $this->withoutExceptionHandling();
        $this->post('/product/', [
            'category_id' => $this->faker->numberBetween(1,20),
            'name' => $this->faker->name,
            'details' => $this->faker->text,
            'photos' => null,
            'price' => $this->faker->numberBetween(100,99999),
            'discount' => $this->faker->numberBetween(0,100),
            'slug' => $this->faker->slug,
        ]);

        $product= Product::all();
        dd(($product->name));
        $this->assertCount(1, $product);
//        $this->assertInstanceOf(Carbon::class, $product->created_at);

        $this->assertInstanceOf('string', $product->name);
    }
}
