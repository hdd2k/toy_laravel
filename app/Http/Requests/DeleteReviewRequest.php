<?php


namespace App\Http\Requests;


class DeleteReviewRequest extends BaseRequest
{
    public function rules()
    {
        return [
            //
        ];
    }

    public function getReviewDto()
    {
        return new ReviewDto($this->input('content'));
    }
}