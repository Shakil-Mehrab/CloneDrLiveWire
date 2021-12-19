<?php

namespace App\Listeners;

use App\Events\AccountCreated;
use App\Notifications\Auth\SendWelcomeNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeNotificationListener
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
    public function handle(AccountCreated $event)
    {

        $event->user->notify(new SendWelcomeNotification($event->user));
    }
}
