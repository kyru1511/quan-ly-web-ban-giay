<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Giày Sneaker',
            'Giày Thể Thao',
            'Giày Lifestyle',
            'Giày Chạy Bộ',
            'Giày Đá Banh'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($categories),
            'slug' => $this->faker->unique()->slug(),
        ];
    }
}