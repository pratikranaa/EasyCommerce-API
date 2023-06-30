<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Get reviews for a specific product.
     *
     * @param int $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductReviews($productId)
    {
        $product = Product::findOrFail($productId);

        $reviews = $product->reviews;

        return response()->json([
            'success' => true,
            'data' => $reviews
        ]);
    }

    /**
     * Create a new review for a specific product.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProductReview(Request $request, $productId)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $product = Product::findOrFail($productId);

        $review = new Review();
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->product_id = $product->id;
        $review->save();

        return response()->json([
            'success' => true,
            'data' => $review
        ]);
    }

    /**
     * Update details of a specific review.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $reviewId
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateReview(Request $request, $reviewId)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $review = Review::findOrFail($reviewId);

        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->save();

        return response()->json([
            'success' => true,
            'data' => $review
        ]);
    }

    /**
     * Delete a specific review.
     *
     * @param int $reviewId
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteReview($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->delete();

        return response()->json([
            'success' => true,
            'message' => 'Review deleted successfully'
        ]);
    }
}



