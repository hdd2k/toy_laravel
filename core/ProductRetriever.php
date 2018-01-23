<?php

namespace Core;

use App\Product;

class ProductRetriever
{
    public function retrieveById(int $productId)
    {
        return Product::firstOrFail($productId);
    }

    public function retrieveAll()
    {
        return Product::all();
    }

    public function retrieveBySearchParam(ProductSearchParamDto $searchParamDto)
    {
        $query = Product::query();

        $name = $searchParamDto->getName();
        if (null !== $name) {
            $query->where('name', 'LIKE', "%{$name}%");
        }

        return $query->paginate(
            $searchParamDto->getSize(),
            ['*'],
            'page',
            $searchParamDto->getPage()
        );
    }

    public function retrieveCollectionBySearchParam(ProductSearchParamDto $searchParamDto)
    {
        $query = Product::query();

        $name = $searchParamDto->getName();
        if (null !== $name) {
            $query->where('name', 'LIKE', "%{$name}%");
        }

        return $query->get();
    }
}
