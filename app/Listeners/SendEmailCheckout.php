<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Events\SomeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailCheckout
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
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        //echo "Evento Disparado";
         $user = $event->getUser();
    }
}
