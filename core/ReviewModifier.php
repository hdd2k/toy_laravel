<?php


namespace Core;

use App\Review;

class ReviewModifier
{
    public function modifyReview(Review $review, ReviewDto $dto)
    {
        $review->content = $dto->getContent();
    }

}