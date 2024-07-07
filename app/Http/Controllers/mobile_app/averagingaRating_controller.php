<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_averagrRating;
use App\Models\model_feedback;
use Illuminate\Http\Request;

class averagingaRating_controller extends Controller
{
    public function retrieveRatingsByDoctorId(Request $request)
    {
        $doctorId = $request->input('doctor_id');

        // Check if doctor_id exists in the model_feedback table
        $doctorExists = model_feedback::where('doctor_id', $doctorId)->exists();

        if (!$doctorExists) {
            return response()->json([
                'result' => 'error',
                'message' => 'Doctor not found or no ratings available',
            ], 404); // 404 Not Found status
        }

        // Retrieve ratings based on doctor_id
        $ratings = model_feedback::where('doctor_id', $doctorId)
            ->pluck('rating') // Assuming 'rating' is the column name storing ratings
            ->all();

        return response()->json([
            'result' => 'success',
            'data' => $ratings,
        ]);
    }


    public function saveAverageRating(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'doctor_id' => 'required', // Ensure doctor_id exists in the doctors table
            'average_rating' => 'required|numeric|between:0,5'
        ]);

        // Check if the doctor already has an average rating entry
        $ratingUpdate = model_averagrRating::where('doctor_id', $validatedData['doctor_id'])->first();

        if ($ratingUpdate) {
            // Update existing entry
            $ratingUpdate->average_rating = $validatedData['average_rating'];
            $ratingUpdate->number_of_reviews=$request['numberOfReviews'];  // Update number of reviews if necessary
            $ratingUpdate->save();
            $message = 'Average rating updated successfully.';
            $averageRating = $ratingUpdate->average_rating;
        } else {
            // Create new entry
            $rating = new model_averagrRating();
            $rating->doctor_id = $validatedData['doctor_id'];
            $rating->average_rating = $validatedData['average_rating'];
            $ratingUpdate->number_of_reviews=$request['numberOfReviews']; // Initialize the number of reviews
            $rating->save();
            $message = 'Average rating inserted successfully.';
            $averageRating = $rating->average_rating;
        }

        return response()->json([
            'message' => $message,
            'average_rating' => $averageRating
        ]);
    }
}



