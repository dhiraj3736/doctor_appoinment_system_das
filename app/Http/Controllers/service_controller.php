<?php

namespace App\Http\Controllers;

use App\Models\model_admin;
use App\Models\model_service;
use Illuminate\Http\Request;

class service_controller extends Controller
{
    public function run_add_service(){
        return view('admin/add_services');
      }

public function insert_service(Request $request){
    $input=new model_service();
    $input->service=$request['service'];
    $input->discription=$request['description'];
    $input->price=$request['price'];
    $input->save();
    return redirect()->back();

}
public function select_service(){
    $notification=session('a_id');

    $service = model_service::all();

    return view('admin/add_services', compact('service'));
}

public function edit_service($s_id){

    $service = model_service::all();
    $edit = model_service::find($s_id);
    return view('admin/add_services', compact('service', 'edit'));
}

public function update_service(Request $reque,$s_id){
    $input=model_service::find($s_id);
   
    $input->service=$reque['service'];
    $input->discription=$reque['description'];
    $input->price=$reque['price'];
    $input->save();
    return redirect('add_service');

}

public function delete_service($s_id){
    $dele=model_service::find($s_id)->delete();
  
    return back();
}

}
