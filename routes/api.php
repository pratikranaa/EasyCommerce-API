<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Products
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);



Route::prefix('products')->group(function () {
    Route::get('{productId}/reviews', [ReviewController::class, 'getProductReviews']);
    Route::post('{productId}/reviews', [ReviewController::class, 'createProductReview']);
    Route::put('reviews/{reviewId}', [ReviewController::class, 'updateReview']);
    Route::delete('reviews/{reviewId}', [ReviewController::class, 'deleteReview']);
});
