<?php

namespace App\Listeners;

use App\Events\ProductCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ProductEventsListener
{

    public function __construct()
    {
        //
    }

    public function handle(ProductCreatedEvent $event)
    {
        $product = $event->product;
        Log::info('Product created with name: '.$product->name);
    }
}
