<?php

namespace Core;

use App\Product;

class ProductModifier
{
    public function modifyProduct(Product $product, ProductDto $dto)
    {
        $product->name = $dto->getName();
    }

}