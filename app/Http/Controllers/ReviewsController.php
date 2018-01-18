<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Requests\DeleteReviewRequest;
use Core\ReviewCreator;
use Core\ReviewModifier;
use Core\ReviewRetriever;
use \Illuminate\Support\Facades\DB;
use Exception;
use App\Review;
use Illuminate\Http\Response;

class ReviewsController extends Controller
{
    public function listReviews()
    {
        $reviews = Review::all();

        return response($reviews);
    }

    public function createReview(CreateReviewRequest $request, ReviewCreator $creator)
    {
        $dto = $request->getReviewDto();

        DB::beginTransaction();
        try {
            $review = $creator->createReview($dto);
            $review->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return response($review, Response::HTTP_CREATED);
    }

    public function getReview(int $reviewId)
    {
        $prod = Review::find($reviewId);

        return response($prod);
    }

    public function updateReview(UpdateReviewRequest $request, ReviewRetriever $retriever, ReviewModifier $modifier, int $reviewId)
    {
        $review = $retriever->retrieveById($reviewId);
        $dto = $request->getReviewDto();

        DB::beginTransaction();
        try {
            $modifier->modifyReview($review, $dto);
            $modifier->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return response($review);
    }

    public function deleteReview(DeleteReviewRequest $request, ReviewRetriever $retriever, int $reviewId)
    {
        $review = $retriever->retrieveById($reviewId);

        DB::beginTransaction();
        try {
            $review->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return response($review, Response::HTTP_NO_CONTENT);
    }
}
