<?php

namespace App\Http\Requests;

use Core\ReviewSearchParamDto;

class ListReviewRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'size' => 'int',
            'page' => 'int',
        ];
    }

    public function getListReviewSearchParamDto()
    {
        return new ReviewSearchParamDto(
            $this->input('content', null),
            $this->input('size', 10),
            $this->input('page', 1)
        );
    }
}
