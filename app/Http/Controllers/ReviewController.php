<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review = new Review($validatedData);
        $product->reviews()->save($review);

        return response()->json($review, 201);
    }
}
