<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_doctor;
use App\Models\model_feedback;
use App\Models\model_service;

use App\Models\model_signup;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\select;

class doctor_profile_controller extends Controller
{

    public function select_doctor_info_for_profile(Request $request)
    {
        try {
            // Get the doctor ID from the request
            $d_id = $request->input('d_id');



            // Find the doctor by ID
            $doctor = model_doctor::where('d_id',$d_id)
            ->leftjoin('average_rating','doctor.d_id',"=",'average_rating.doctor_id')
            ->select('doctor.*','average_rating.average_rating')
            ->first();

            // Check if the doctor exists
            if (!$doctor) {
                return response()->json([
                    'result' => 'error',
                    'message' => 'No doctor found'
                ], 404);
            }

            // Prepare the doctor data
            $doctorData = [

                'name' => $doctor->name,
                'specialist' => $doctor->specialist,
                'experiance' => $doctor->experiance,
                'qualification' => $doctor->qualification,
                'starttime' => $doctor->fromtime,
                'endtime' => $doctor->totime,
                'image' => url('storage/uploads/' . $doctor->image),
                'description' => $doctor->description,
                'nmc_no' => $doctor->nmc_no,
                'service_id' => $doctor->service_id,
                'rating_value'=>$doctor->average_rating ?:0

            ];

            // Return the response
            return response()->json([
                'result' => 'success',
                'data' => $doctorData
            ]);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error in select_doctor_info: ' . $e->getMessage());

            // Return an error response
            return response()->json([
                'result' => 'error',
                'message' => 'Server error'
            ], 500);
        }
    }

    public function select_service_name_for_profile(Request $request)
    {
        // Decode JSON string into an array
        $service_ids = json_decode($request->input('service_id'), true);

        // Check if decoding was successful


        // Fetch services based on IDs
        $service = model_service::whereIn('s_id', $service_ids)->exists();
        $services = model_service::whereIn('s_id', $service_ids)->get();


        if (!$service) {
            return response()->json([
                'result'=> 'error',
                'message'=> 'id_not_found'
                ],404);
        }
        if ($services->isEmpty()) {
            return response()->json([
                'result' => 'error',
                'message' => 'No services found'
            ], 404); // 404 Not Found
        }

        // Format the service data
        $serviceData = $services->map(function($service) {
            return [
                'service_name' => $service->service,
            ];
        });

        return response()->json([
            'result' => 'success',
            'data' => $serviceData
        ], 200); // 200 OK
    }


    public function insert_rating(Request $request)
    {
        try {
            // Validate input
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'doctor_id' => 'required|integer',
                'rating' => 'required|numeric|min:0|max:5',
            ]);

            // Check if a record already exists for the given user and doctor
            $feedback = model_feedback::where('user_id', $request->user_id)
                ->where('doctor_id', $request->doctor_id)
                ->first();

            if ($feedback) {
                // Update the existing record
                $feedback->rating = $request->rating;
                $feedback->save();

                return response()->json([
                    'result' => 'success',
                    'message' => 'Feedback updated successfully',
                    'rating' => $feedback->rating,
                ]);
            } else {
                // Insert a new record
                $feedback = new model_feedback();
                $feedback->user_id = $request->user_id;
                $feedback->doctor_id = $request->doctor_id;
                $feedback->rating = $request->rating;
                $feedback->save();

                return response()->json([
                    'result' => 'success',
                    'message' => 'Feedback inserted successfully',
                    'rating' => $feedback->rating,
                ]);
            }
        } catch (Exception $e) {
            Log::error('Failed: ' . $e->getMessage());

            return response()->json([
                'result' => 'failure',
                'message' => 'Failed to insert or update feedback. Please try again later.',
            ], 500);
        }
    }


    public function insert_comment(Request $request)
    {
        try {
            // Validate input
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'doctor_id' => 'required|integer',
                'comment' => 'required|string|max:1000',
            ]);

            // Check if a record already exists for the given user and doctor
            $feedback = model_feedback::where('user_id', $request->user_id)
                ->where('doctor_id', $request->doctor_id)
                ->first();

            if ($feedback) {
                // Update the existing comment
                $feedback->comment = $request->comment;
                $feedback->save();

                return response()->json([
                    'result' => 'success',
                    'message' => 'Comment updated successfully',
                ]);
            } else {
                // Insert a new comment
                $feedback = new model_feedback();
                $feedback->user_id = $request->user_id;
                $feedback->doctor_id = $request->doctor_id;
                $feedback->comment = $request->comment;
                $feedback->save();

                return response()->json([
                    'result' => 'success',
                    'message' => 'Comment submitted successfully',
                ]);
            }
        } catch (Exception $e) {
            Log::error('Failed to insert or update comment: ' . $e->getMessage());

            return response()->json([
                'result' => 'failure',
                'message' => 'Failed to insert or update comment. Please try again later.',
            ], 500);
        }
    }


    public function retrive_comment(Request $request)
    {
        $d_id = $request->doctor_id;

        // Check if doctor_id exists in the model_feedback table
        $doctorExists = model_feedback::where('doctor_id', $d_id)->exists();

        if (!$doctorExists) {
            // doctor_id does not exist in the database
            return response()->json([
                'result' => 'not_found',
                'message' => 'doctor_id not found',
            ], 404); // 404 Not Found status
        }

        // Retrieve comments based on doctor_id
        $comments = model_feedback::where('doctor_id', $d_id)
            ->join('signup', 'table_feedback.user_id', '=', 'signup.u_id')
            ->select('table_feedback.*', 'signup.fullname')
            ->get();

        // Filter out comments where 'comment' column is null
        $filtered_comments = $comments->filter(function ($comment) {
            return $comment->comment !== null;
        });



        // Format the comments
        $formatted_comments = $filtered_comments->map(function ($comment) {
            return [
                'user_name' => $comment->fullname,
                'comment' => $comment->comment,
            ];
        });

        // Return the comments
        return response()->json([
            'result' => 'success',
            'data' => $formatted_comments,
        ]);
    }

    public function get_rating(Request $request)
    {

            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'doctor_id' => 'required|integer',

            ]);



            // Check if a record already exists for the given user and doctor
            $feedback = model_feedback::where('user_id', $request->user_id)
                ->where('doctor_id', $request->doctor_id)
                ->first();

            if ($feedback) {
                // Update the existing comment

                return response()->json([
                    'result' => 'success',
                    'message' => 'Comment updated successfully',
                    'rating'=>$feedback->rating,
                ]);
            }

    }
    public function doctor_info_for_doctor_list(Request $request){
        try {
            // $service_id = $request->input('s_id');

            // Assuming you have a 'service_id' column in your 'doctors' table
            $doctors = model_doctor::
            leftjoin('average_rating','doctor.d_id',"=",'average_rating.doctor_id')
            ->select('doctor.*','average_rating.average_rating')
            ->get();
            if ($doctors->isEmpty()) {
                return response()->json([
                    'result' => 'error',
                    'message' => 'No doctors found for this service'
                ], 404);
            }

            $doctorData = [];
            foreach ($doctors as $doctor) {
                $doctorData[] = [
                    'd_id'=>$doctor->d_id,
                    'name' => $doctor->name,
                    'specialist' => $doctor->specialist,
                    'experiance' => $doctor->experiance,
                    'qualification' => $doctor->qualification,
                    'image' => url('storage/uploads/' . $doctor->image),
                    'rating_value'=>$doctor->average_rating ?:0
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
