<?php

namespace App\Http\Requests;

use Core\ProductDto;
use Illuminate\Foundation\Http\FormRequest;

class DeleteProductRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

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
