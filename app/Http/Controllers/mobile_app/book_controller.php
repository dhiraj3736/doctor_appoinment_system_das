<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_book;
use App\Models\model_doctor;
use App\Models\model_signup;
use DateInterval;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class book_controller extends Controller
{
    public function getAvailableTimeSlots(Request $request)
    {
        $d_id = $request['d_id'];
        $date = $request['date']; // Add this to get date-specific slots

        // Fetch the doctor's time from the database
        $doctor = model_doctor::where('d_id', $d_id)->first();

        if (!$doctor) {
            return response()->json([
                'result' => 'error',
                'message' => 'No doctor found'
            ], 404);
        }

        $fromtime = $doctor->fromtime;
        $totime = $doctor->totime;

        // Parse and generate 30-minute intervals
        $timeSlots = [];
        $start = new DateTime($fromtime);
        $end = new DateTime($totime);

        while ($start < $end) {
            $timeSlots[] = $start->format('H:i');
            $start->add(new DateInterval('PT30M')); // Add 30 minutes
        }

        // Fetch booked time slots for the given date
        $bookedSlots = model_book::where('doctor', $doctor->name)
            ->where('date', $date)
            ->pluck('time')
            ->toArray();

        return response()->json([
            'result' => 'success',
            'availableSlots' => $timeSlots,
            'bookedSlots' => $bookedSlots
        ]);
    }

    public function saveAppoinment(Request $request)
    {
        $d_id = $request['d_id'];
        $date = $request['date'];
        $time = $request['time'];
        $reason=$request['reason'];
        $u_id = $request['user_id'];


        $doctor = model_doctor::where('d_id', $d_id)->first();
        $user_info = model_signup::where('u_id', $u_id)->first();

        if (!$user_info) {
            return response()->json([
                'result' => 'error',
                'message' => 'user not Found'
            ], 404);
        }

        $user_name = $user_info->fullname;
        $user_email = $user_info->email;
        $user_address = $user_info->address;
        $user_number = $user_info->number;
        $doctor_name = $doctor->name;

        $saveinfo = new model_book();
        $saveinfo->name = $user_name;
        $saveinfo->email = $user_email;
        $saveinfo->address = $user_address;
        $saveinfo->number = $user_number;
        $saveinfo->doctor = $doctor_name;
        $saveinfo->date = $date;
        $saveinfo->time = $time;
        $saveinfo->reason = $reason;
        $saveinfo->u_id = $u_id;
        $saveinfo->save();

        return response()->json([
            'result' => 'success',
            'message'=> 'book appoiment'
        ], 200);
    }

    public function EditAppoinment(Request $request)
    {
        $b_id=$request['b_id'];
        $date = $request['date'];
        $time = $request['time'];
        $reason=$request['reason'];


        $book = model_book::where('b_id', $b_id)->first();


        if (!$book) {
            return response()->json([
                'result' => 'error',
                'message' => 'user not Found'
            ], 404);
        }


        $book->date = $date;
        $book->time = $time;
        $book->reason = $reason;
        $book->save();

        return response()->json([
            'result' => 'success',
            'message'=> 'Edit book'
        ], 200);
    }
    public function select_doctor_info(Request $request)
    {
        try {
            // Get the doctor ID from the request
            $d_id = $request->input('d_id');



            // Find the doctor by ID
            $doctor = model_doctor::where('d_id',$d_id)->first();

            // Check if the doctor exists
            if (!$doctor) {
                return response()->json([
                    'result' => 'error',
                    'message' => 'No doctor found'
                ], 404);
            }


            return response()->json([
                'result' => 'success',
                'name' => $doctor->name,
                'specialist' => $doctor->specialist,
                'nmc_no' => $doctor->nmc_no,
                'price'=>$doctor->price,
                'image' => url('storage/uploads/' . $doctor->image),
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

}
