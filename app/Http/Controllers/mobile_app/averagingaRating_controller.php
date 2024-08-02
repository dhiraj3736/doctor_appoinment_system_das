<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_averagrRating;
use App\Models\model_feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $ratingUpdate->number_of_reviews = $request['numberOfReviews'];  // Update number of reviews if necessary
            $ratingUpdate->save();
            $message = 'Average rating updated successfully.';
            $averageRating = $ratingUpdate->average_rating;
        } else {
            // Create new entry
            $rating = new model_averagrRating();
            $rating->doctor_id = $validatedData['doctor_id'];
            $rating->average_rating = $validatedData['average_rating'];
            $rating->number_of_reviews = $request['numberOfReviews']; // Initialize the number of reviews
            $rating->save();
            $message = 'Average rating inserted successfully.';
            $averageRating = $rating->average_rating;
        }

        return response()->json([
            'message' => $message,
            'average_rating' => $averageRating
        ]);
    }

    public function topRated()
    {
        // Join doctor details with their ratings
        $doctors = DB::table('average_rating')
            ->join('doctor', 'average_rating.doctor_id', '=', 'doctor.d_id')
            ->select('doctor.*', 'average_rating.average_rating', 'average_rating.number_of_reviews')
            ->get();

        if ($doctors->isEmpty()) {
            return response()->json(['message' => 'No doctor ratings found'], 404);
        }

        // Calculate mean rating (C)
        $C = $doctors->avg('average_rating');

        // Minimum number of reviews required (m)
        $m = 0; // Adjust as needed

        // Calculate weighted ratings
        foreach ($doctors as $doctor) {
            $v = $doctor->number_of_reviews;
            $R = $doctor->average_rating;
            $doctor->weighted_rating = ($R * $v + $C * $m) / ($v + $m);
        }

        // Sort doctors by weighted rating and get the top 4 doctors
        $topDoctors = $doctors->sortByDesc('weighted_rating')->take(4);

        $doctorData = [];
        foreach ($topDoctors as $doctor) {
            $doctorData[] = [
                'd_id' => $doctor->d_id,
                'name' => $doctor->name,
                'specialist' => $doctor->specialist,
                'experiance' => $doctor->experiance,
                'qualification' => $doctor->qualification,
                'image' => url('storage/uploads/' . $doctor->image),
                'rating_value' => $doctor->average_rating ?: 0
            ];
        }

        return response()->json([
            'result' => 'success',
            'data1' => $doctorData,
        ]);
    }


}



