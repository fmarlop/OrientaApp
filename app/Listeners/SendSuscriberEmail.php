<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use Illuminate\Support\Facades\Mail;

class SendSuscriberEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // no lo voy a necesitar.
    }

    /**
     * Handle the event.
     */
    public function handle(UserSubscribed $event): void
    {
        Mail::raw('Gracias por suscribirte a nuestro boletín', function($message) use($event) { // método raw para no tener que crear views o clase mailable. método use() porque la función callback está fuera del alcance de poder usar el objeto $event.
            $message->to($event->user->email);
            $message->subject('Gracias');
        });
    }
}
