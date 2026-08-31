<?php
declare(strict_types=1);
namespace App\Listeners\Email;

use App\Events\Email\ReceiveContactEmail;
use App\Mail\ReceiveContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ReceiveContactEmailListener implements ShouldQueue
{
    public int $tries = 3;
    public int $backoff = 5;

    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(ReceiveContactEmail $event): void
    {
        Mail::to('patrickpeixer5@gmail.com', 'ColtBytes')->send(new ReceiveContactMail($event->data));
    }
}