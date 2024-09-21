<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_signup;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class editUserInfoController extends Controller
{
    public function select_user_info_for_editprofile(Request $request)
    {
        try {
            // Get the doctor ID from the request
            $u_id = $request->input('user_id');



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


            // Return the response
            return response()->json([
                'result' => 'success',
                'fullname' => $user->fullname,

                'address' => $user->address,
                'number' => $user->number,
                'image' => url('storage/uploads/' . $user->image),
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

    public function saveEditInfo(Request $request){
        $u_id = $request->input('user_id');

        $user = model_signup::find($u_id);

        $user->fullname=$request['fullname'];
        $user->address=$request['address'];
        $user->number=$request['number'];
        $user->save();

        return response()->json([
            'result' => 'success',
            'message' => 'edit success'
        ]);
    }

    public function saveChangePhoto(Request $request)
    {
        $request->validate([
            'image' => 'required|string', // Since it's Base64, it's sent as a string
        ]);
        $u_id = $request->input('user_id');

        $user = model_signup::find($u_id);

        if ($user) {
            // Get the Base64 image string
            $imageBase64 = $request->input('image');

            // Decode the Base64 string into binary data
            $imageData = base64_decode($imageBase64);

            // Generate a unique filename
            $filename = time() . "-doctor.jpg";

            // Store the file in the 'uploads' directory
            $filePath = storage_path('app/public/uploads/' . $filename);

            // Save the image file
            file_put_contents($filePath, $imageData);

            // Update the user's image path in the database
            $user->image = $filename;
            $user->save();

            return response()->json([
                'result' => 'success',
                'message' => 'Image updated successfully',
            ]);
        } else {
            return response()->json([
                'result' => 'fail',
                'message' => 'User not found',
            ]);
        }
    }

}
