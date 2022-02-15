<?php

namespace App\Listeners;

use App\Mail\Mailky;
// use App\Events\MessageCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class MessageCreatedListener
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
    public function handle($message)
    {
        Mail::to($message->post)->send(new Mailky($message->post));
    }
}
// Mail::to($event->user)->send(new CreatedExample($event->example));