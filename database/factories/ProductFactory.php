<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10000, 500000),
            'sale_price' => null,
            'sku' => fake()->unique()->regexify('[A-Z]{3}[0-9]{6}'),
            'stock_quantity' => fake()->numberBetween(0, 100),
            'image_url' => fake()->imageUrl(800, 800, 'fashion'),
            'category_id' => null,
            'brand_id' => null,
            'is_active' => true,
            'weight' => fake()->numberBetween(100, 2000),
            'dimensions' => [
                fake()->numberBetween(10, 50),
                fake()->numberBetween(10, 50),
                fake()->numberBetween(5, 20),
            ],
            'tags' => fake()->words(3),
        ];
    }

    public function onSale(): static
    {
        return $this->state(fn (array $attributes) => [
            'sale_price' => $attributes['price'] * 0.8,
        ]);
    }

    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock_quantity' => 0,
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
