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

        // Assuming d_id is passed to fetch specific doctor times
        $d_id = $request['d_id'];

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

        return response()->json([
            'result' => 'success',
            'data' => $timeSlots
        ]);

    }

    public function saveAppoinment(Request $request)
    {
        $d_id = $request['d_id'];
        $date = $request['date'];
        $time = $request['time'];
        $u_id = $request['user_id'];


        $doctor = model_doctor::where('d_id', $d_id)->first();



        $user_info = model_signup::where('u_id',$u_id)->first();
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
        $saveinfo->u_id = $u_id;
        $saveinfo->save();

        return response()->json([
            'result' => 'success',
            'message'=> 'book appoiment'
            ],200);


    }
}


