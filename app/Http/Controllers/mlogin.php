<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\model_admin;
use Illuminate\Http\Request;
use App\Models\model_signup;
use App\Notifications\registerNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Import Log facade
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;


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

        if (!$user->email_verified_at) {
            // User not found
            return response()->json([
                'error' => 'Email not verified',
                'message' => 'Email not verified',
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
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:signup,email', // Email must be unique in the signup table
            'password' => 'required',
            'address' => 'required',
            'number' => 'required',
        ]);

        DB::beginTransaction();
        try {
            // Proceed with registration
            $input = new model_signup();
            $input->fullname = $request->fullname;
            $input->email = $request->email;
            $input->password = md5($request->password); // Use hashing or bcrypt for better security
            $input->address = $request->address;
            $input->number = $request->number;
            $input->remember_token = Str::random(40);

            // Save the user
            $input->save();

            // Notify admin and send confirmation email
            Notification::send(model_admin::all(), new registerNotification($input->fullname));
            Mail::to($input->email)->send(new RegisterMail($input));

            // Commit the transaction after all actions succeed
            DB::commit();

            return response()->json(['result' => 'success', 'message' => 'Registration successful'], 201); // 201 Created

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error during registration: '.$e->getMessage()); // Log the error
            return response()->json(['result' => 'error', 'message' => 'Registration failed. Please try again later.'], 500); // 500 Internal Server Error
        }
    }
}
