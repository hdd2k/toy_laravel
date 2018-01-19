<?php

namespace App\Http\Requests;

use Core\ProductSearchParamDto;

class ListProductRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'size' => 'int',
            'page' => 'int',
        ];
    }

    public function getListProductSearchParamDto()
    {
        return new ProductSearchParamDto(
            $this->input('name', null),
            $this->input('size', 10),
            $this->input('page', 1)
        );
    }
}
