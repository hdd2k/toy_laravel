<?php

namespace App\Console\Commands;

use Core\ProductRetriever;
use Illuminate\Console\Command;
use Psr\Log\LoggerInterface;

class ExportProductsListToCsvFileCommand extends Command
{
    protected $signature = 'toy:export-product-lists';

    protected $description = 'Command description';

    public function handle(ProductRetriever $retriever, LoggerInterface $logger)
    {
        $logger->info('[ExportProductsListToCsvFileCommand] 작업을 시작합니다.');
        $products = $retriever->retrieveAll();

        $path = storage_path('products_' . str_random() . '.csv');

        try {
            $fp = fopen($path, 'w');
            foreach ($products as $prod) {
                fputcsv($fp, $prod->toArray());
            }
        } catch (\Exception $e) {
            $logger->error('[ExportProductsListToCsvFileCommand] 작업 실패했습니다', ['foo' => 'bar']);
            throw $e;
        }

        $logger->info('[ExportProductsListToCsvFileCommand] 작업을 성공적으로 종료합니다.');
    }
}
