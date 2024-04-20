<?php

namespace App\Http\Controllers;

use App\Models\model_report;
use Illuminate\Http\Request;

class report_controller extends Controller
{
    public function run_report(){
        return view('view_report');
    }

    public function send_report_to_user() {
        $user_id = session('u_id');
        
      
        $rep = model_report::from('doctor_report')
                    ->join('book', 'doctor_report.b_id', '=', 'book.b_id')
                    ->select('doctor_report.*','book.service','book.doctor')
                    ->where('doctor_report.u_id', $user_id) 
                    ->get(); 
    $data=compact('rep');
    return view('view_report')->with($data);
    
    }
    
}
