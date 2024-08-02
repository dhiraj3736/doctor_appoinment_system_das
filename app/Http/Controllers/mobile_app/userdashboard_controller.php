<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_doctor;
use App\Models\model_service;
use App\Models\model_signup;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class userdashboard_controller extends Controller
{


    public function select_user_info(Request $request){

        $user_id=$request["u_id"];
        $user_info=model_signup::find($user_id);

        if(!$user_info){
            return response()->json([
                'error'=>'user not found'
            ],404);
        }
        return response()->json([
            'result' => 'success',
            'Fullname'=>$user_info->fullname,
            'image' => url('storage/uploads/' . $user_info->image)
        ]);

}

public function select_service(){
    $service=model_service::all();

    if(!$service){
        return response()->json([
            'error'=>'services not found'
        ],404);
    }

    $servicedata=$service->map(function($service){
        return[
            's_id'=>$service->s_id,
            'service'=>$service->service,
        ];
    });


    return response()->json([
        'result'=>'success',

        'services'=>$servicedata


    ]);
}


public function select_doctor_info_for_userdashboard(Request $request){
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
