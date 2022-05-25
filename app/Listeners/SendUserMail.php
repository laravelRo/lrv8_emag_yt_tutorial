<?php

namespace App\Listeners;

use App\Mail\NewOrderMail;
use App\Events\NewOrderEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserMail
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
     * @param  \App\Events\NewOrderEvent  $event
     * @return void
     */
    public function handle(NewOrderEvent $event)
    {

        //trimitem mailul de confirmare utilizatorului
        Mail::to($event->order->user->email)
            ->send(new NewOrderMail($event->order));
    }
}
