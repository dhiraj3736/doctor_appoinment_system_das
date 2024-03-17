<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_signup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


class signup_controller extends Controller
{
    public function run_signup()
    {
        return view('signup');
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'fullname' => 'required',
                'gender' => 'required',
                'username' => 'required',
                'password' => 'required',
                'password-confirmation' => 'required',
                'address' => 'required',
                'number' => 'required',
                'email' => 'required'


            ]
        );
        $input = new model_signup();

        $input->fullname = $request['fullname'];
        $input->gender = $request['gender'];
        $input->username = $request['username'];
       
        $input->password = md5($request['password']);
        $input->address = $request['address'];
        $input->number = $request['number'];
        $input->email = $request['email'];
        $input->save();
        return redirect()->back();
    }

    public function run_login(){
        return view('login');
    }

    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = model_signup::where('email', $request->email)->first();
    
        if (!$user || $user->password !== md5($request->password)) {
            // Authentication failed
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }else{
    
        // Authentication successful
        Auth::login($user);

        $fullname = $user->fullname;
        $email = $user->email;
        $u_id=$user->u_id;
        $request->session()->put('email',$email);
       
        $request->session()->put('fullname',$fullname);
        $request->session()->put('u_id',$u_id);

        
       
        // Redirect to userdashboard route
        return redirect('/userdashboard');
    }}
    
    
    
    
    public function main(){
        if(session('email')){
        return view('userdashboard');
    }else{
        return view('login');
    }
}
    
    
}
