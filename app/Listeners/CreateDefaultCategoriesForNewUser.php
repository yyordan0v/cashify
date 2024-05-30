<?php

namespace App\Listeners;

use App\Events\UserCreated;

class CreateDefaultCategoriesForNewUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        $user = $event->user;

        $defaultCategories = [
            ['name' => 'Work', 'color' => 'blue', 'icon' => 'work-icon'],
            ['name' => 'Personal', 'color' => 'green', 'icon' => 'personal-icon'],
            // Add more default categories as needed...
        ];

        foreach ($defaultCategories as $category) {
            $user->categories()->create($category);
        }
    }
}
