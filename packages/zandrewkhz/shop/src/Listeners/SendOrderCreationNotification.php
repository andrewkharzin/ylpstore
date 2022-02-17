<?php

namespace Andrewkharzin\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Andrewkharzin\Events\OrderCreated;
use Andrewkharzin\Notifications\OrderPlacedSuccessfully;

class SendOrderCreationNotification implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param OrderCreated $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $customer = $event->order->customer;
        $customer->notify(new OrderPlacedSuccessfully($event->order));
    }
}
