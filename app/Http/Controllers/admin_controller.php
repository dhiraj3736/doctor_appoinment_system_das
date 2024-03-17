<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_signup;
use App\Models\model_book;
use App\Models\model_service;

use App\Models\model_doctor;

class admin_controller extends Controller
{
    public function run_admin_dashboard(){
        return view('admin/admin_dashboard');
    }

    public function run_view_user(){
        return view('admin/view_user');
    }

    public function select_for_user(){
        $select_data=model_signup::all();
        $data=compact('select_data');
        return view('admin/view_user')->with($data);
       

    }
    public function select_for_dashboard(){
        $user=model_signup::all();
        $book=model_book::all();
        $doctors=model_doctor::all();
        $service = model_service::all();

        $data=compact('user','book','doctors','service');
      
        return view('admin/admin_dashboard')->with($data);

    }

    public function run_appoinment(){
        return view('admin/view_appoinment');
    }


    public function select_appoinment(){
        $select_data=model_book::all();
        $doctors=model_doctor::all();

        
        $data=compact('select_data');
      
        return view('admin/view_appoinment')->with($data);

    }
   

  public function status($b_id){
    $stat=model_book::find($b_id);
    if($stat){
        if($stat->status){
            $stat->status=0;
        }
        else{
            $stat->status=1;
        }
        $stat->save();
    }
    return back();
  }
 

  public function remove_user($u_id){
    $user=model_signup::find($u_id)->delete();
    return back();
  }



}
