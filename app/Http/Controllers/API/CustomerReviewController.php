<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\CustomerReview;
use Exception;
use Illuminate\Http\Request;

class CustomerReviewController extends Controller
{
    //create review
    public function create_review(Request $request)
    {


        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'rating' => 'required|integer|min:1|max:5',
                'user_id' => 'required|exists:users,id',
                'comment' => 'required|string',
            ]);


            $dataReview = CustomerReview::create([
                'name' => $request->name,
                'rating' => $request->rating,
                'user_id' => $request->user_id,
                'comment' => $request->comment,
            ]);


            return ResponseFormatter::success(
                [
                    "data" => $dataReview
                ],
                'Success Submit Review'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    "message" => "Something went wrong",
                    "error" => $error
                ],
                "Create Review Failed",
                500
            );
        }
    }

    public function getAll()
    {
        $data = CustomerReview::all();

        return ResponseFormatter::success(
            [
                "reviews" => $data
            ],
            'Success get data review'
        );
    }
}
