<?php

namespace App\Listeners;

use App\Events\ListProductsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Facades\Excel;

class ListProductsListener
{
    public function __construct()
    {
        //
    }

    public function handle(ListProductsEvent $event)
    {
        $products = $event->products;

        // Make products list into CSV
        Excel::create('products_listing_excel', function(){

        });
    }
}
