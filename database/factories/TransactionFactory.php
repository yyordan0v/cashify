<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
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
            'category_id' => Category::factory(),
            'account_id' => Account::factory(),
            'title' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, -10000, 10000),
            'details' => $this->faker->paragraph,
        ];
    }
}
