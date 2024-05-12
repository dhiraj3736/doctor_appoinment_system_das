<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_signup;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegisterMail;
use App\Events\NewDataInserted;
use App\Models\model_admin;
use App\Notifications\Booknotification;
use App\Notifications\registerNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;



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

                'password-confirmation' => 'required|same:password',
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
        $input->remember_token=Str::random(40);

        $input->save();
        $admin=model_admin::all();

        Notification::send($admin, new registerNotification($input->fullname));

        Mail::to($input->email)->send(new RegisterMail($input));
        return redirect()->back()->with('message','Your account register successfully and verify your email address ');

    }

    public function verify($token){
        $input=model_signup::where('remember_token','=', $token)->first();
        if(!empty($input)){
            $input->email_verified_at=date('Y-m-d H:i:s');
            $input->remember_token=Str::random(40);

            $input->save();
            return redirect('login')->with('message','Your account  successfully and verified');

        }
        else{
            abort(404);
        }
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

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }

        if (!$user->email_verified_at) {
            return redirect()->back()->with('error', 'Email not verified');
        }

        if ($user->password !== md5($request->password)) {
            // Authentication failed
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }

        // Authentication successful
        Auth::login($user);

        $fullname = $user->fullname;
        $email = $user->email;
        $u_id = $user->u_id;
        $request->session()->put('email', $email);
        $request->session()->put('fullname', $fullname);
        $request->session()->put('u_id', $u_id);

        // Redirect to userdashboard route
        return redirect('/userdashboard');
    }




    public function main(){
        if(session('email')){
        return view('userdashboard');
    }else{
        return view('login');
    }


}
public function get_notification() {

    return view('userdashboard ');


}

public function run_profile(){
    $u_id=session('u_id');
    $user =model_signup::find($u_id);
    $data=compact('user');
    return view('user_profile')->with($data);
}

public function add_profile_picture(Request $request){

    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming maximum file size is 2048 KB (2 MB)
    ]);
    $u_id=session('u_id');
    $input =model_signup::find($u_id);

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

public function edit_profile(Request $request){

    $request->validate(
        [
            'fullname' => 'required',
            'username' => 'required',

            'address' => 'required',
            'number' => 'required',
            'email' => 'required'


        ]
    );

    $u_id=session('u_id');
    $input = model_signup::find($u_id);

    $input->fullname = $request['fullname'];
    $input->username = $request['username'];

    $input->address = $request['address'];
    $input->number = $request['number'];
    $input->email = $request['email'];

    $input->save();


    return redirect()->back()->with('message','Your account register successfully and verify your email address ');

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

    $doctor = model_signup::where('email', $email)->first();

    // Check if doctor exists
    if (!$doctor) {
        return redirect()->back()->with('error', 'Doctor not found.');
    }
    // Check if old password matches
    if ($doctor->password === $oldPassword) {
        // Update the password
        $doctor->password = $newPassword;
        $doctor->save();


        return redirect()->back()->with('message', 'Password changed successfully.');
    } else {
        return redirect()->back()->with('message', 'Incorrect old password or email.');
    }
}

}
