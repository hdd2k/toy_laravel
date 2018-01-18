<?php


namespace App\Http\Requests;


class UpdateReviewRequest
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

    public function getReviewDto()
    {
        return new ReviewDto($this->input('content'));
    }
}