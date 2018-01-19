<?php

namespace Core;

use App\Review;

class ReviewRetriever
{
    public function retrieveById(int $reviewId)
    {
        return Review::firstOrFail($reviewId);
    }

    public function retrieveAll()
    {
        return Review::all();
    }

    public function retrieveBySearchParam(ReviewSearchParamDto $searchParamDto)
    {
        $query = Review::query();

        $content = $searchParamDto->getContent();
        if ($content !== null) {
            $query->where('content', 'LIKE', "%{$content}%");
        }

        return $query->paginate(
            $searchParamDto->getSize(),
            ['*'],
            'page',
            $searchParamDto->getPage()
        );
    }
}