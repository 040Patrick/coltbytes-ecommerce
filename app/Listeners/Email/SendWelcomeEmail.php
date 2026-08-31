<?php

namespace App\Listeners\Email;

use App\Events\Email\SendRegisteredEmail;
use App\Jobs\Email\SendWelcomeMailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct(){ }

    /**
     * Handle the event.
     */
    public function handle(SendRegisteredEmail $event): void
    {
        SendWelcomeMailJob::dispatch($event->user);
    }
}
