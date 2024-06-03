<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        event(new Registered($user));

        Transaction::factory(10)->create([
            'user_id' => $user->id,
        ]);

//        User::factory()->has(
//            Account::factory()->count(3),
//            'accounts'
//        )->has(
//            Category::factory()->count(5),
//            'categories'
//        )->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);


    }
}
