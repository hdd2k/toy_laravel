<?php


namespace Core;

use App\Review;

class ReviewCreator
{
    public function createReview(ReviewDto $dto)
    {
        $review = new Review;
        $review->content = $dto->getContent();

        return $review;
    }
}