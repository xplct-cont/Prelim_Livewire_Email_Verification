<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Log;
use App\Events\UserEvent;
use Illuminate\Support\Facades\Auth;

class UserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserEvent $event)
    {
        Log::create([
            'user_id' => auth()->user()->id,
            'log_entry' => $event->log_entry
        ]);
    }
}
