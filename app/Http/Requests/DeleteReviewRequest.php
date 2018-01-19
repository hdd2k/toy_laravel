<?php


namespace App\Http\Requests;


class DeleteReviewRequest
{
    public function authorize()
    {
        return true;
//        return false;
    }

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