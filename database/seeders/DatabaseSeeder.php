<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->has(
            Account::factory()->count(3),
            'accounts'
        )->has(
            Category::factory()->count(5),
            'categories'
        )->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
