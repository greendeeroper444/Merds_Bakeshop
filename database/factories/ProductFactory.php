<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {
        $product_name = $this->faker->unique()->words($nb=2, $asText=true);
        $slug = Str::slug($product_name);
        return [
            'name' =>$product_name,
            'slug' =>$slug,
            'description' =>$this->faker->text(100),
            'regular_price' =>$this->faker->numberBetween(10,500),
            'SKU' => 'BAKE' . $this->faker->unique()->numberBetween(1000, 9999),
            'stock_status' => 'instock',
            'quantity' =>$this->faker->numberBetween(100,200),
            'image' => 'stock_' . $this->faker->unique()->numberBetween(1,12). '.png',
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
