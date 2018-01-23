<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ProductCreatedEvent' => [
            'App\Listeners\ProductEventsListener',
        ],
        'App\Events\ReviewCreatedEvent' => [
            'App\Listeners\ReviewEventsListener',
        ],
        'App\Events\ListProductsEvent' => [
            'App\Listeners\ListProductsListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
