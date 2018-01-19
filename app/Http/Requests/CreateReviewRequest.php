<?php


namespace App\Http\Requests;

use Core\ReviewDto;

class CreateReviewRequest extends BaseRequest
{
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