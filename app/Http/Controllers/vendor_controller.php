<?php

namespace App\Http\Controllers;

use App\Models\doctor_v_model;
use App\Models\model_book;
use App\Models\model_doctor;
use App\Models\model_report;
use App\Models\model_signup;
use App\Notifications\reportNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class vendor_controller extends Controller
{

    public function view_d_appoinment(){
        return view('Doctor/view_d_appoinment');
    }
    
    public function select_appoinment(Request $request){
     
        $search=$request['search'] ?? "";
        if($search!==""){
            $select_item=model_book::where('name','LIKE',"%$search%")->paginate(7);
        }else{
            $select_item=model_book::orderBy('b_id','desc')->paginate(7);

        }
      
        $doctor_info=model_doctor::all();
        $data=compact('select_item','doctor_info');
      
        return view('Doctor/view_d_appoinment')->with($data);

    }

    public function view_my_appoinment(){
        return view('Doctor/view_my_appoinment');
    }
    public function select_my_appoinment(Request $request){
        $v_id=session('v_id');
        $search=$request['search'] ?? "";
        if($search!==""){
            $user = doctor_v_model::find($v_id); 
            $name=$user->name;
            $select_item=model_book::where('doctor',$name)->where('name','LIKE',"%$search%")->paginate(7);

        }else{
            $user = doctor_v_model::find($v_id); 
            $name=$user->name;
            $select_item=model_book::where('doctor',$name)->orderBy('b_id','desc')->paginate(7);
        }
      

        $doctor_info=model_doctor::all();
        $report=model_report::all();
        $data=compact('select_item','user','doctor_info','report');
      
        return view('Doctor/view_my_appoinment')->with($data);

    }

public function send_report(Request $request){
    $report=new model_report();

   
    $report->report=$request['report'];
    $report->u_id=$request['u_id'];
    $report->b_id=$request['b_id'];
    $report->save();
    $user=model_signup::find($report->u_id);
    Notification::send($user, new reportNotification($report->b_id));


    return back()->with('message', ' information updated successfully.');


}

   

    public function view_user(){
        return view('Doctor/view_d_user');
    }

    public function select_user(Request $request){
        
        $search=$request['search'] ?? ""; 
        if($search !== ""){
            $select_data=model_signup::where('fullname','LIKE',"%$search%")->orwhere('username','LIKE',"%$search%")->paginate(7); 

        }else{
            $select_data=model_signup::orderBy('u_id','desc')->paginate(7);

        }
        $doctor_info=model_doctor::all();
        $data=compact('select_data','doctor_info');
        return view('Doctor/view_d_user')->with($data);

    }

   public function get_notification() {
 
    $doctor_info=model_doctor::all(); 
    return view('Doctor/doctor_dashboard ', ['doctor_info'=>$doctor_info]);
}

public function run_doctor_profile(){
    
    return view('Doctor/doctorprofile');
}


public function add_profile_picture(Request $request){

    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming maximum file size is 2048 KB (2 MB)
    ]);
    $v_id=session('v_id');
    $doctor =doctor_v_model::find($v_id); 
    $name=$doctor->name;
    $input=model_doctor::where('name',$name)->first();


    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Generate a unique filename
        $filename = time() . "-doctor." . $request->file('image')->getClientOriginalExtension();

        // Store the file in the 'uploads' directory
        $request->file('image')->storeAs('public/uploads', $filename);

        // Save other form data along with the filename
      

        $input->image = $filename;
        $input->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'profile upload successfully.');
    } else {
        // Redirect back with error message if file upload fails
        return redirect()->back()->with('error', 'Failed to upload image.');
    }
}
    

public function send_doctor_info(){
    $v_id=session('v_id');
    $user = doctor_v_model::find($v_id); 

    $doctor_info=model_doctor::all();
    $data=compact('user','doctor_info');
    return view('Doctor/doctorprofile')->with($data);

}
public function doctor_dashboard(){
    $doctor_info=model_doctor::all();
    $data=compact('doctor_info');
    return view('Doctor/doctor_dashboard')->with($doctor_info);



}


public function edit_doctor_info(Request $request){
    $v_id=session('v_id');
    $user = doctor_v_model::find($v_id);
    $dname=$user->name; 

    $doctor_info = model_doctor::where('name', $dname)->first();
    
    $doctor_info->nmc_no = $request['nmc'];
    $doctor_info->specialist = $request['spec'];
    $doctor_info->qualification = $request['qual'];
    $doctor_info->experiance = $request['expe'];
    $doctor_info->fromtime=$request['fromtime'];
    $doctor_info->totime=$request['totime'];
    
    $doctor_info->save();

    return back()->with('success', ' information updated successfully.');
}


public function change_password(Request $request) {
    $request->validate([
        'oldPassword' => 'required',
        'newPassword' => 'required',
        'confirmPassword' => 'required|same:newPassword',
        'email' => 'required'
    ]);

    $email = $request->email;
    $oldPassword = md5($request->oldPassword);
    $newPassword = md5($request->newPassword);

    $doctor = doctor_v_model::where('email', $email)->first();

    // Check if doctor exists
    if (!$doctor) {
        return redirect()->back()->with('error', 'Doctor not found.');
    }
    // Check if old password matches
    if ($doctor->Password === $oldPassword) {
        // Update the password
        $doctor->Password = $newPassword;
        $doctor->save();
        

        return redirect()->back()->with('message', 'Password changed successfully.');
    } else {
        return redirect()->back()->with('message', 'Incorrect old password or email.');
    }
}


}
    
    



    

