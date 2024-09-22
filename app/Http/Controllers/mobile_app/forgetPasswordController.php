<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_signup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class forgetPasswordController extends Controller
{
    public function forgetpasswordpost(Request $request)
{
    // Validate the email input
    $request->validate([
        'email' => 'required|email|exists:signup,email',
    ]);

    // Generate a unique token
    $token = Str::random(64);
    $email = $request->input('email');

    // Fetch the user by email
    $user = model_signup::where('email', $email)->first();

    if (!$user) {
        return response()->json([
            'result' => 'failure',
            'message' => "No user found with this email address."
        ], 404);
    }

    // Get the user's full name
    $name = $user->fullname;

    // Insert the token into the database
    DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $email],
        ['token' => $token, 'created_at' => Carbon::now()]
    );

    // Send the password reset email
    try {
        Mail::send("emails.forget-password", ['token' => $token, 'name' => $name], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return response()->json([
            'result' => 'success',
            'message' => "We have sent an email to reset your password. Please check your email."
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'result' => 'failure',
            'message' => "Failed to send the email. Please try again later."
        ], 500);
    }
}

public function resetPasswordPost(Request $request)
{
    // Validate the request
    $request->validate([
        'currentpassword' => 'required',  // Current password is required for validation
        'newpassword' => 'required|min:8',
        'confirmpassword' => 'required|same:newpassword',
    ]);

    // Retrieve the user_id from the request
    $user_id = $request->input('user_id');

    // Find the user by user ID
    $user = model_signup::where('u_id', $user_id)->first();

    // Check if the current password matches the user's password
    if ($user && $user->password == md5($request->input('currentpassword'))) {
        // Update the password with the new one
        $user->password = md5($request->input('newpassword'));
        $user->save();

        // Return success response
        return response()->json([
            'result' => 'success',
            'message' => 'Password updated successfully'
        ]);
    } else {
        // Return error response if the current password doesn't match
        return response()->json([
            'result' => 'error',
            'message' => 'Current password is incorrect'
        ], 400);
    }
}

}
