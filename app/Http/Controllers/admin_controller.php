<?php

namespace App\Http\Controllers;

use App\Models\model_admin;
use Illuminate\Http\Request;
use App\Models\model_signup;
use App\Models\model_book;
use App\Models\model_service;
use Illuminate\Support\Facades\Auth;
use App\Models\model_doctor;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Booknotification;


class admin_controller extends Controller
{
public function admin_login_page(){
    return view('admin/admin_login');
}




public function admin_login(Request $request){
    $request->validate(
        [
            'email'=>'required|email',
            'password'=>'required',
        ]
        );

        $user=model_admin::where('email',$request->email)->first();

        if(!$user|$user->password!=md5($request->password)){
            return redirect('/admin_login')->with('error', 'Invalid email or password');;
        }else{
            auth::login($user);

          
            $email = $user->email;
            $a_id=$user->a_id;
            $request->session()->put('email',$email);
           
          
            $request->session()->put('a_id',$a_id);
            return redirect('/admin_dashboard');
        }
}






    public function run_admin_dashboard(){
        return view('admin/admin_dashboard');
    }
  

    public function run_view_user(){
        return view('admin/view_user');
    }

    public function select_for_user(Request $request){
      
        //search
        $search=$request['search'] ?? ""; 
        if($search !== ""){
            $select_data=model_signup::where('fullname','LIKE',"%$search%")->orwhere('username','LIKE',"%$search%")->paginate(7); 

        }
        //normal
        else{
            $select_data = model_signup::orderBy('u_id', 'desc')->paginate(7);
        }

        
     

        $data=compact('select_data','search');
        return view('admin/view_user')->with($data);
       

    }
    public function select_for_dashboard(Request $request){
        $search=$request['search'] ?? "";
            //search
        if($search!==""){
            $user = model_signup::where('fullname','LIKE',"%$search%")->orwhere('username','LIKE',"%$search%")->get(); 
            $book=model_book::where('name','LIKE',"%$search%")->get(); 
            $doctors=model_doctor::where('name','LIKE',"%$search%")->get(); 
            $service = model_service::where('service','LIKE',"%$search%")->get(); 
        }
        //normal
        else{
            $user = model_signup::orderBy('u_id', 'desc')->take(4)->get();
            $book=model_book::orderBy('b_id', 'desc')->take(4)->get();
           $doctors=model_doctor::orderBy('d_id','desc')->take(3)->get();
           $service = model_service::orderBy('s_id','desc')->take(3)->get();
        }
       
       


        $data=compact('user','book','doctors','service');
      
        return view('admin/admin_dashboard')->with($data);

    }

    public function run_appoinment(){
        return view('admin/view_appoinment');
    }


    public function select_appoinment(Request $request){
        $notification=session('a_id');
        $search=$request['search'] ?? "";
        //search
        if($search!==""){
            $select_data=model_book::where('name','LIKE',"%$search%")->paginate(7); 
        }else{
            $select_data=model_book::orderBy('b_id', 'desc')->paginate(7);

        }
        
      


        
        $data=compact('select_data');
      
        return view('admin/view_appoinment')->with($data);

    }
   

    public function status($b_id)
    {
        // Find the book by its ID
        $book = model_book::find($b_id);
    
        // If the book is found
        if ($book) {
            // Toggle the status
            $book->status = $book->status ? 0 : 1;
    
            // Save the changes to the book
            $book->save();
    
            // If the status changed to approved
            if ($book->status) {
                // Get the user associated with the book
                $user = model_signup::find($book->u_id);
    
                // If the user is found
                if ($user) {
                    // Send a notification to the user
                    Notification::send($user, new Booknotification($book->name));
                } else {
                    // Handle the case where the user is not found
                    // You can log an error or show a message to the user
                }
            }
        } else {
            // Handle the case where the book is not found
            // You can log an error or show a message to the user
        }
    
        // Redirect back to the previous page
        return back();
    }
    
 

//   public function remove_user($u_id){
//     $user=model_signup::find($u_id)->delete();
   

//     return back();
//   }
public function remove_user($u_id)
{
    // Check if there are dependent rows in the book table
    $dependent_books = model_book::where('u_id', $u_id)->get();

    // If there are dependent books, delete or update them first
    if ($dependent_books->count() > 0) {
        foreach ($dependent_books as $book) {
            // Option 1: Delete the dependent book
            $book->delete();

            // Option 2: Update the dependent book to remove the reference to the user
            // $book->update(['u_id' => null]);
        }
    }

    // Now you can safely delete the user from the signup table
    $user = model_signup::find($u_id);
    if ($user) {
        $user->delete();
    }

    return back();
}




}
