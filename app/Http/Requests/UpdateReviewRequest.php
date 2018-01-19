<?php


namespace App\Http\Requests;


class UpdateReviewRequest extends BaseRequest
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

    public function getReviewDto()
    {
        return new ReviewDto($this->input('content'));
    }
}