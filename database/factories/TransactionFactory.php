<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
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
            'user_id' => 1,
            'category_id' => Category::where('user_id', 1)->inRandomOrder()->first()->id,
            'account_id' => Account::where('user_id', 1)->inRandomOrder()->first()->id,
            'title' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, -10000, 10000),
            'details' => $this->faker->paragraph,
        ];
    }
}
