<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
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
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brands = ['Nike', 'Adidas', 'Puma', 'Converse', 'Vans', 'New Balance', 'Reebok', 'Jordan'];

        return [
            'name' => $this->faker->randomElement($brands) . ' ' . $this->faker->randomElement(['Air Max', 'Ultraboost', 'Classic', 'Old Skool', 'Chuck Taylor', 'Air Force', 'Retro', 'High Top']) . ' ' . $this->faker->randomElement(['Black', 'White', 'Red', 'Blue', 'Green']),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->numberBetween(1500000, 5000000),
            'image' => 'https://via.placeholder.com/400x400/6366f1/ffffff?text=' . urlencode($this->faker->randomElement($brands)),
            'brand' => $this->faker->randomElement($brands),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}