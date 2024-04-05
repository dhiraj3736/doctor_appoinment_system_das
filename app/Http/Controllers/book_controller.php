<?php

namespace App\Http\Controllers;

use App\Models\doctor_v_model;
use App\Models\model_admin;
use Illuminate\Http\Request;
use App\Models\model_book;
use App\Models\model_doctor;
use App\Models\model_service;
use App\Models\model_signup;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Booknotification;
use Illuminate\Support\Facades\Session;


class book_controller extends Controller
{
    public function run(){
        $url=url('/book');
        $title="Book Appoinment";
        $u_id=session('u_id');
        $user =model_signup::find($u_id); 
        $data=compact('url','title','user');
        return view('book')->with($data);
    }
    public function insert(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'gender' => 'required',
            'dov' => 'required|date',
            'email' => 'required|email',
            'address' => 'required',
            'service' => 'required',
            'doctor' => 'required',
            'time' => 'required',
            'number' => 'required'
        ]);

        $input = new model_book();
        $input->name = $request->input('fname');
        $input->gender = $request->input('gender');
        $input->date = $request->input('dov');
        $input->email = $request->input('email');
        $input->address = $request->input('address');
        $input->service = $request->input('service');
        $input->doctor = $request->input('doctor');
        $input->time = $request->input('time');
        $input->number = $request->input('number');
        $input->u_id = session('u_id');
    
        $input->save();
        $doctors = doctor_v_model::all(); 
        $admin=model_admin::all();
        $recipients = $doctors->merge($admin);
        Notification::send($recipients, new Booknotification($input->name,$input->doctor));
        return redirect()->back()->with('message', 'Appointment booked successfully.');
    }
    

    public function select(){
        $select_item = model_book::where('u_id', session('u_id'))->paginate(4); // Paginate the results with 4 records per page
        $u_id=session('u_id');
        $user =model_signup::find($u_id); 
        return view('view_appoinment', compact('select_item','user'));
    }
    
public function delete($b_id){
    $del=model_book::find($b_id)->delete();
    return redirect()->back();

}

public function retrive_service(){
    $url=url('/book');
    $title="Book Appoinment";
    $u_id=session('u_id');
    $user =model_signup::find($u_id); 
    $service=model_service::all();
    $doctor=model_doctor::all();
    $data=compact('service','doctor','url','title','user');
    return view('book')->with($data);
        
}

public function edit($b_id){
    $url=url('/edit').'/'.$b_id;
    $title="update"; 
    
    $service=model_service::all();
    $select_item=model_book::find($b_id);
    $doctor=model_doctor::all();
    $u_id=session('u_id');
    $user =model_signup::find($u_id); 
    $data=compact('service','doctor','select_item','url','title','user');
    return view('book')->with($data);
}

public function update(Request $request,$b_id){
    $request->validate([
        'fname' => 'required',
        'gender' => 'required',
        'dov' => 'required|date',
        'email' => 'required|email',
        'address' => 'required',
        'service' => 'required',
        'doctor' => 'required',
        'time' => 'required',
        'number' => 'required'
    ]);
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
// public function __construct()
// {
//     $this->middleware('auth.user')->only('run_service');
// }

public function run_service(){
    $email=Session::get('email');
    if($email){
    return view('view_service');
    }else{
        return view('login');
    }
}

public function view_service(){
    $u_id=session('u_id');
    $user =model_signup::find($u_id); 
    $service=model_service::all();
    $data=compact('service','user');
    return view('view_service')->with($data);
}

public function run_doctor(){
    
    return view('view_doctor');

}

public function retrive_doctor_info(){
    
    $doctor=model_doctor::all();
    $u_id=session('u_id');
    $user =model_signup::find($u_id); 
    $data=compact('doctor','user');
    return view('view_doctor')->with($data);
}



// Import the Appointment model

public function index()
{
    // Assuming you're retrieving appointment records from the Appointment model
    $appointments = model_book::paginate(10); // Paginate the results with 10 records per page

    return view('view_appoinment', compact('appointments'));
}

}
