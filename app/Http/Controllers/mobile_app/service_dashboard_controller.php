<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Http\Controllers\doctor_controller;
use App\Models\model_doctor;
use App\Models\model_service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class service_dashboard_controller extends Controller
{
    public function select_service_info(Request $request){
        $service_id=$request['s_id'];
        $service=model_service::find($service_id);

        if(!$service_id){
            return response()->json([
                'error'=>'service not found'
            ],404);
        }

        return response()->json([
            'result'=>'success',
            'discription'=>$service->discription,
            'service'=>$service->service,
            'image'=> url('storage/uploads/' . $service->image)

        ]);

    }


    public function select_doctor_info(Request $request){
        try {
            $service_id = $request->input('s_id');




            // Assuming you have a 'service_id' column in your 'doctors' table
            $doctors = model_doctor::whereJsonContains('service_id', $service_id)
            ->leftjoin('average_rating','doctor.d_id',"=",'average_rating.doctor_id')
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
