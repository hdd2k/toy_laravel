<?php

namespace App\Http\Requests;

use Core\ProductSearchParamDto;

class DownloadProductsRequest extends BaseRequest
{
    public function rules()
    {
        return [];
    }

    public function getListProductSearchParamDto()
    {
        return new ProductSearchParamDto(
            $this->input('name', null)
        );
    }
}
