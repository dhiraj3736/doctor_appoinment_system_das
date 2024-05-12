<?php

namespace App\Http\Controllers;

use App\Models\model_signup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;




class ForgetPasswordController extends Controller
{
    public function forgetpassword(){
        return view('forget-password/forgetpassword');
    }


    public function forgetpasswordpost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:signup',
        ]);
        $token=Str::random(length:64);
        $email=$request['email'];
        $user_name=model_signup::where('email',$email)->first();
        $name=$user_name->fullname;

        DB::table('password_reset_tokens')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);
        Mail::send("emails.forget-password",['token'=>$token,'name'=>$name],function($message) use ($request){
            $message->to($request->email);
            $message->subject("reset password");
        });
        return redirect()->to(route('Forget-password'))->with("success","we have send an email to reset password please check that email");
    }

    public function resetPassword($token){
        return view('/emails/new-password',compact('token'));

    }

    public function resetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:signup',
            'password'=>'required',
            'confirm-password'=>'required|same:password',
        ]);

        $updatepassword=DB::table('password_reset_tokens')->where([
            "email"=>$request->email,
            "token"=>$request->token,
        ]);

        if(!$updatepassword){
            return redirect()->to(route('Forget-password'))->with("error","invaid email");
        }


        // model_signup::where("email",$request->email)->update("password",md5($request->password));

        $change=model_signup::where('email',$request->email)->first();

        $change->password = md5($request['password']);
        $change->save();


        DB::table('password_reset_tokens')->where("email",$request->email)->delete();

        return redirect('login')->with("success","succesufully reset");
    }
}
