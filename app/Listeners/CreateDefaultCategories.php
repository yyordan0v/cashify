<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Config;

class CreateDefaultCategories implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $user = $event->user;

        $defaultCategories = Config::get('default-categories');

        foreach ($defaultCategories as $category) {
            $user->categories()->create($category);
        }
    }
}
