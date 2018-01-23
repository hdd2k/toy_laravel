<?php

namespace App\Listeners;

use App\Events\ProductCreatedEvent;
use Psr\Log\LoggerInterface;

class ProductEventsListener
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function handle(ProductCreatedEvent $event )
    {
        $product = $event->getProduct();
        $this->logger->info("Product created.", $product->toArray());
    }
}
