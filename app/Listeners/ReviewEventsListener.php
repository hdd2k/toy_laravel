<?php

namespace App\Listeners;

use App\Events\ReviewCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReviewEventsListener
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
     * @param  ReviewCreatedEvent  $event
     * @return void
     */
    public function handle(ReviewCreatedEvent $event)
    {
        //
    }
}
