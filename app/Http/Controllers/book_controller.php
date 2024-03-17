<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_book;
use App\Models\model_doctor;
use App\Models\model_service;

class book_controller extends Controller
{
    public function run(){
        $url=url('/book');
        $title="Book Appoinment";
        $data=compact('url','title');
        return view('book')->with($data);
    }

    public function insert(Request $request){
        $input=new model_book();
        $input->name=$request['fname'];
        $input->gender=$request['gender'];
        $input->date=$request['dov'];
        $input->email=$request['email'];
        $input->address=$request['address'];
        $input->service=$request['service'];
        $input->doctor=$request['doctor'];
        $input->time=$request['time'];
        $input->number=$request['number'];
        $input->u_id=session('u_id');

        $input->save();
        return redirect()->back();
 }

 public function select(){
   
    $select_item = model_book::where('u_id', session('u_id'))->get();
    $data=compact('select_item');
    return view('view_appoinment')->with($data);
 }
public function delete($b_id){
    $del=model_book::find($b_id)->delete();
    return redirect()->back();

}

public function retrive_service(){
    $url=url('/book');
    $title="Book Appoinment";
    $service=model_service::all();
    $doctor=model_doctor::all();
    $data=compact('service','doctor','url','title');
    return view('book')->with($data);
        
}

public function edit($b_id){
    $url=url('/edit').'/'.$b_id;
    $title="update"; 
    
    $service=model_service::all();
    $select_item=model_book::find($b_id);
    $doctor=model_doctor::all();

    $data=compact('service','doctor','select_item','url','title');
    return view('book')->with($data);
}

public function update(Request $request,$b_id){
    $input=model_book::find($b_id);
    $input->name=$request['fname'];
    $input->gender=$request['gender'];
    $input->date=$request['dov'];
    $input->email=$request['email'];
    $input->address=$request['address'];
    $input->service=$request['service'];
    $input->doctor=$request['doctor'];
    $input->time=$request['time'];
    $input->number=$request['number'];
   
    $input->save();
    return redirect('/view_appoinment');

   

}


public function run_service(){
    return view('view_service');
}

public function view_service(){
  
    $service=model_service::all();
    $data=compact('service');
    return view('view_service')->with($data);
}

public function run_doctor(){
    return view('view_doctor');

}

public function retrive_doctor_info(){
    $doctor=model_doctor::all();
    $data=compact('doctor');
    return view('view_doctor')->with($data);
}
}
