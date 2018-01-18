<?php

namespace Core;

use App\Product;

class ProductCreator
{
    public function createProduct(ProductDto $dto)
    {
        $product = new Product;
        $product->name = $dto->getName();

        return $product;
    }
}