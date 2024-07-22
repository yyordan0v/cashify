<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateDefaultAccount implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $user = $event->user;

        $user->accounts()->create([
            'name' => 'Default',
            'balance' => 0,
            'color' => 'gray'
        ]);
    }
}
