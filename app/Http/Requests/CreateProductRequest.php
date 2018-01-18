<?php

namespace App\Http\Requests;

use Core\ProductDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

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
