<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->word,
            'type' => fake()->randomElement(['expense', 'income']),
            'color' => fake()->randomElement(['lime', 'blue', 'slate', 'pink', 'yellow', 'red']),
            'icon' => fake()->randomElement(['bill', 'bicycle', 'bread', 'butterfly', 'calendar', 'camera']),
        ];
    }
}
