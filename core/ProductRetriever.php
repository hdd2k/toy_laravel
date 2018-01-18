<?php

namespace Core;

use App\Product;

class ProductRetriever
{
    public function retrieveById(int $productId)
    {
        return Product::firstOrFail($productId);
    }
}