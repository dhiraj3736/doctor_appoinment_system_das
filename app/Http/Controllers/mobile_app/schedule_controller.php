<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_book;
use Illuminate\Http\Request;
use Carbon\Carbon;

class schedule_controller extends Controller
{

    public function get_upcoming_schedule(Request $request)
{
    $u_id = $request->input('u_id');

    $book = model_book::join('doctor', 'book.doctor', '=', 'doctor.name')
        ->select('book.*', 'doctor.specialist', 'doctor.image', 'doctor.d_id')
        ->where('book.u_id', '=', $u_id)
        ->where('book.date', '>=', Carbon::now()->format('Y-m-d'))
        ->orderBy('book.date', 'desc')
        ->get();

    if ($book->isEmpty()) {
        return response()->json([
            'status' => 'error',
            'message' => 'no book found'
        ], 404);
    }




    $bookdata = [];
    foreach ($book as $data) {
        $bookdata[] = [
            'image' =>url('storage/uploads/' . $data->image) ,
            'doctor_name' => $data->doctor,
            'specialist' => $data->specialist,
            'date' => $data->date,
            'time' => $data->time,
            'reason'=> $data->reason,
            'b_id'=> $data->b_id,
            'd_id'=>$data->d_id
        ];
    }

    return response()->json([
        'result' => 'success',
        'data' => $bookdata
    ]);
}




public function get_completed_schedule(Request $request)
{
    $u_id = $request->input('u_id');

    $book = model_book::join('doctor', 'book.doctor', '=', 'doctor.name')
        ->select('book.*', 'doctor.specialist', 'doctor.image','doctor.d_id')
        ->where('book.u_id', '=', $u_id)
        ->where('book.date', '<', Carbon::now()->format('Y-m-d'))
        ->orderBy('book.date', 'desc')
        ->get();

    if ($book->isEmpty()) {
        return response()->json([
            'status' => 'error',
            'message' => 'no book found'
        ], 404);
    }




    $bookdata = [];
    foreach ($book as $data) {
        $bookdata[] = [
            'image' =>url('storage/uploads/' . $data->image) ,
            'doctor_name' => $data->doctor,
            'specialist' => $data->specialist,
            'date' => $data->date,
            'time' => $data->time,
            'reason'=> $data->reason,
            'b_id'=> $data->b_id,
            'd_id'=>$data->d_id
        ];
    }

    return response()->json([
        'result' => 'success',
        'data' => $bookdata
    ]);
}

  }

