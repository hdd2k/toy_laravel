<?php

namespace App\Jobs;

use App\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;

class ProcessListProductJob implements ShouldQueue
{
    private $products;
    private $requestedUser;

    public function __construct(Collection $products, User $requestedUser)
    {
        $this->products = $products;
        $this->requestedUser = $requestedUser;
    }


    public function handle(Mailer $mailer)
    {
        $path = storage_path('products_' . str_random() . '.csv');
        $fp = fopen($path, 'w');
        foreach ($this->products as $prod) {
            fputcsv($fp, $prod->toArray());
        }

        // 요청한 사용자에게 요청했던 파일을 전달한다.
    }
}
