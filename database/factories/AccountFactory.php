<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
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
            'color' => fake()->randomElement(['lime', 'blue', 'slate', 'pink', 'yellow', 'red']),
            'balance' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
