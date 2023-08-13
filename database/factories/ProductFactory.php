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
        $name = fake()->name();
        return [
            'name' => $name, 
            'description' => fake()->realText(2000), 
            'product_image' => fake()->imageUrl(), 
            'initial_price' => fake()->numberBetween(1000, 5000), 
            'final_price' => fake()->numberBetween(100, 500),
            'qty_in_stock' => fake()->numberBetween(1, 10),
            'price_rule' => 'default',
            'deliverable' => 0       
        ];
    }
}
