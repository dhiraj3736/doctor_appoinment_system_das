<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use App\Models\model_signup;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Log; // Import Log facade
use Illuminate\Support\Facades\Mail;


class mlogin extends Controller
{
    // public function mobile_login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $user = model_signup::where('email', $request->email)->first();

    //     if (!$user) {
    //         return response()->json([
    //             'result' => 'fail',
    //             'message' => 'Invalid email or password.'
    //         ], 401);
    //     }

    //     if (!$user->email_verified_at) {
    //         return response()->json([
    //             'result' => 'fail',
    //             'message' => 'Email not verified.'
    //         ], 403);
    //     }

    //     if ($user->password !== md5($request->password)) {
    //         return response()->json([
    //             'result' => 'fail',
    //             'message' => 'Invalid email or password.'
    //         ], 401);
    //     }

    //     // Log in the user
    //     Auth::login($user);

    //     // Store user information in session
    //     $request->session()->put('email', $user->email);
    //     $request->session()->put('fullname', $user->fullname);
    //     $request->session()->put('u_id', $user->u_id);

    //     // Generate session ID
    //     $sessionId =$user->u_id;

    //     // Return JSON response with success message, session ID, and user information
    //     return response()->json([
    //         'result' => 'success',
    //         'session_id' => $sessionId,
    //         'user' => [
    //             'fullname' => $user->fullname,
    //             'email' => $user->email,
    //             'u_id' => $user->u_id
    //         ]
    //     ]);

    // }




    public function authentication(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to find the user
        $user = model_signup::where('email', $credentials['email'])->first();

        if (!$user) {
            // User not found
            return response()->json([
                'error' => 'USER_NOT_FOUND',
                'message' => 'Invalid credentials',
            ], 401);
        }

        if ($user->status === 0) {
            // User is suspended
            return response()->json([
                'error' => 'USER_SUSPENDED',
                'message' => 'User is suspended',
            ], 403);
        }

        if ($user->password !== md5($credentials['password'])) {
            // Invalid password
            return response()->json([
                'error' => 'INVALID_PASSWORD',
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Generate a session ID (or token if you are using tokens)
        $sessionId = $user->u_id;

        // Provide user details in the response
        return response()->json([
            'result' => 'success',
            'session_id' => $sessionId,
            'user' =>$user->fullname,


        ], 200);
    }

    public function insert(Request $request)
    {
        $validatedData= $request->validate([
            'fullname' => 'required',

         'email' => 'required|',
         'number' => 'required',
            'password' => 'required',




        ]);

        try {
            // Create a new instance of model_signup
            $input = new model_signup();
            $input->fullname = $validatedData['fullname'];
            $input->email = $validatedData['email'];
            $input->number = $validatedData['number'];
            $input->password = md5($validatedData['password']); // Use bcrypt for password hashing
            $input->remember_token = Str::random(40);
            // Mail::to($input->email)->send(new RegisterMail($input));
            // Save the new user to the database
            $input->save();
            // Return a JSON response
            return response()->json([
                'result' => 'success',
                'user' => $input
            ]);


        } catch (\Exception $e) {
            // Log the error message
            Log::error('Failed to register user: ' . $e->getMessage());

            // Return a failure JSON response
            return response()->json([
                'result' => 'failure',
                'message' => 'Failed to register user. Please try again later.'
            ], 500); // 500 Internal Server Error status code
        }
    }
}
