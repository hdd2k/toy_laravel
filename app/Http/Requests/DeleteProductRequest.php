<?php

namespace App\Http\Requests;

use Core\ProductDto;

class DeleteProductRequest extends BaseRequest
{
    public function rules()
    {
        return [
            //
        ];
    }

    public function getProductDto()
    {
        return new ProductDto($this->input('name'));
    }
}
