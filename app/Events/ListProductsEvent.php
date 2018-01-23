<?php

namespace App\Events;

use App\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ListProductsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}