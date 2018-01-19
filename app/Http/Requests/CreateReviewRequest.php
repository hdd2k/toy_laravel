<?php


namespace App\Http\Requests;

use Core\ReviewDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
//        return false;
    }

    public function rules()
    {
        return [
            'content' => [
                'required',
                'min:3',
            ]
        ];
    }

    public function getReviewDto()
    {
        return new ReviewDto($this->input('content'));
    }
}