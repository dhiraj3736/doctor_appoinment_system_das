<?php

namespace App\Http\Controllers;

use App\Models\doctor_v_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class register_controller extends Controller
{
    public function run_main_dashboard(){
        return view('admin_doctor');
    }

    public function run_register(){
        return view('register');
    }
    public function insert_register_info(Request $request){
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Create a new instance of doctor_v_model
        $doctor = new doctor_v_model();
    
        // Fill the instance with validated data
        $doctor->name = $validatedData['name'];
        $doctor->email = $validatedData['email'];
        $doctor->password = md5($validatedData['password']);
    
        // Save the instance to the database
        $doctor->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Doctor registered successfully!');
    }


    public function doctor_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = doctor_v_model::where('email', $request->email)->first();
    
        if (!$user || $user->Password !== md5($request->password)) {
            // Authentication failed
            return redirect('/register');
        }else{
    
        // Authentication successful
        Auth::login($user);

        $name = $user->name;
        $email = $user->email;
        $v_id=$user->v_id;
        $request->session()->put('email',$email);
       
        $request->session()->put('name',$name);
        $request->session()->put('v_id',$v_id);

        
       
        // Redirect to userdashboard route
        return redirect('/doctor_dashboard');
    }}

    public function doctor_dashboard(){
   
        return view('/Doctor/doctor_dashboard');
  

    
}
   
    
}
