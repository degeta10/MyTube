<?php

namespace App\Listeners\Users;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUserChannel
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $event->user->channel()->create([
            'title' => $event->user->name
        ]);
    }
}
