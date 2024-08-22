<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_doctor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class seacrhController extends Controller
{
    public function select_doctor_info_for_search(Request $request){

        try {
            $userInput=$request['query'];

            $doctors = model_doctor::
            leftjoin('average_rating', 'doctor.d_id', '=', 'average_rating.doctor_id')
            ->select('doctor.*', 'average_rating.average_rating')
            ->where('name', 'LIKE', '%' . $userInput . '%') // Use LIKE for partial matches
            ->get();


            if ($doctors->isEmpty()) {
                return response()->json([
                    'result' => 'error',
                    'message' => 'No doctors found for this service'
                ], 404);
            }

            // Shuffle doctors and take the top 4


            $doctorData = [];
            foreach ($doctors as $doctor) {
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
                'data' => $doctorData
            ]);
        } catch (Exception $e) {
            Log::error('Error in select_doctor_info: ' . $e->getMessage());
            return response()->json([
                'result' => 'error',
                'message' => 'Server error'
            ], 500);
        }
    }
}
