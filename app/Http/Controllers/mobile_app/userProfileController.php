<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_signup;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class userProfileController extends Controller
{
    public function select_user_info_for_profile(Request $request)
    {
        try {
            // Get the doctor ID from the request
            $u_id = $request->input('u_id');



            // Find the doctor by ID
            $user = model_signup::find($u_id);



            // Check if the doctor exists
            if (!$user) {
                return response()->json([
                    'result' => 'error',
                    'message' => 'No user found'
                ], 404);
            }

            // Prepare the doctor data
            $userData = [

                'fullname' => $user->fullname,
                'username' => $user->username,
                'address' => $user->address,
                'number' => $user->number,
                'email' => $user->email,
               'join' => $user->created_at->format('Y-m-d'),

                'image' => url('storage/uploads/' . $user->image),


            ];

            // Return the response
            return response()->json([
                'result' => 'success',
                'data' => $userData
            ]);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error in select_user_info: ' . $e->getMessage());

            // Return an error response
            return response()->json([
                'result' => 'error',
                'message' => 'Server error'
            ], 500);
        }
    }
}
