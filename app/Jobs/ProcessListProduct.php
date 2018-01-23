<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessListProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // TODO: dependency injection for email-able ---> log

    public function __construct()
    {
        //
    }

    public function handle(Product $product)
    {
        // product listing -> default queue -> Console command


        // TODO: CSV format

        // hint : fputcsv (loop through list)

        // TODO: email attachment


    }
}
