<?php


namespace Core;

use App\Review;

class ReviewRetriever
{
    public function retrieveById(int $reviewId)
    {
        return Review::firstOrFail($reviewId);
    }
}