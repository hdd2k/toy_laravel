<?php

namespace App\Http\Requests;

use Core\ProductDto;

class CreateProductRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
            ]
        ];
    }

    public function getProductDto()
    {
        return new ProductDto($this->input('name'));
    }
}
