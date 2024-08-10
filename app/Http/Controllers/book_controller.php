<?php

namespace App\Http\Controllers;

use App\Models\comment_model;
use App\Models\doctor_v_model;
use App\Models\model_admin;
use App\Models\model_averagrRating;
use Illuminate\Http\Request;
use App\Models\model_book;
use App\Models\model_doctor;
use App\Models\model_feedback;
use App\Models\model_service;
use App\Models\model_signup;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Booknotification;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class book_controller extends Controller
{
    public function run(){
        $url=url('/book');
        $title="Book Appoinment";

        $data=compact('url','title');
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
        $select_item = model_book::where('u_id', session('u_id'))->orderBy('b_id','desc')->paginate(4); // Paginate the results with 4 records per page
        $u_id=session('u_id');
        return view('view_appoinment', compact('select_item'));
    }

public function delete($b_id){
    $del=model_book::find($b_id)->delete();
    return redirect()->back();

}

public function retrive_service(){
    $url=url('/book');
    $title="Book Appointment";

    $service=model_service::all();
    $doctor=model_doctor::all();
    $data=compact('service','doctor','url','title');
    return view('book')->with($data);

}

public function edit($b_id){
    $url=url('/edit').'/'.$b_id;
    $title="Update Appointment";

    $service=model_service::all();
    $select_item=model_book::find($b_id);
    $doctor=model_doctor::all();

    $data=compact('service','doctor','select_item','url','title');
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

    $data=compact('doctor');
    return view('view_doctor')->with($data);
}

public function run_doctorProfile($d_id){

    return view('doctorProfile');
}


public function getDoctorInfo($d_id)
{
    $user_id = session('u_id');

    // Retrieve doctor information and average rating
    $doctor = model_doctor::where('d_id', $d_id)
        ->leftJoin('average_rating', 'doctor.d_id', '=', 'average_rating.doctor_id')
        ->select('doctor.*', 'average_rating.average_rating')
        ->first();

    if (!$doctor) {
        return redirect()->back()->with('error', 'Doctor not found');
    }

    // Retrieve comments based on doctor_id
    $comments = comment_model::where('doctor_id', $d_id)
        ->join('signup', 'commenttable.user_id', '=', 'signup.u_id')
        ->select('commenttable.*', 'signup.*')
        ->whereNotNull('comment')
        ->get();

    // Retrieve all ratings for the doctor
    $ratings = model_feedback::where('doctor_id', $d_id)->pluck('rating')->toArray();
    $numberOfReviews = count($ratings);
    $averageRating = $numberOfReviews > 0 ? array_sum($ratings) / $numberOfReviews : 0;

    // Retrieve the current user's rating for the doctor
    $userRating = model_feedback::where('user_id', $user_id)
        ->where('doctor_id', $d_id)
        ->pluck('rating')
        ->first();

    return view('doctorProfile', compact('doctor', 'comments', 'userRating', 'ratings', 'averageRating', 'numberOfReviews'));
}



public function insert_comment(Request $request, $d_id)
{
    try {
        // Get the user_id from the session
        $user_id = session('u_id');

        // Validate the input
        $validatedData = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // Insert a new comment
        $feedback = new comment_model();
        $feedback->user_id = $user_id; // Use the session user_id
        $feedback->doctor_id = $d_id;  // Use the doctor_id from the route parameter
        $feedback->comment = $request->comment;
        $feedback->save();

        // Redirect or perform other actions
        return redirect()->back()->with('success', 'Comment submitted successfully');
    } catch (Exception $e) {
        Log::error('Failed to insert or update comment: ' . $e->getMessage());

        // Redirect or perform other actions
        return redirect()->back()->with('error', 'Failed to insert or update comment. Please try again later.');
    }
}
public function insert_rating(Request $request, $d_id)
{
    try {
        $user_id = session('u_id');
        if (!$user_id) {
            return redirect()->back()->with('error', 'User not logged in');
        }

        // Log the request data
        Log::info('Request Data:', $request->all());

        // Validate input
        $validatedData = $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        // Log the validated data
        Log::info('Validated Data:', ['validatedData' => $validatedData]);

        // Check if a record already exists for the given user and doctor
        $feedback = model_feedback::where('user_id', $user_id)
            ->where('doctor_id', $d_id)
            ->first();

        if ($feedback) {
            // Update the existing record
            $feedback->rating = $validatedData['rating'];
            $feedback->save();
        } else {
            // Insert a new record
            $feedback = new model_feedback();
            $feedback->user_id = $user_id;
            $feedback->doctor_id = $d_id;
            $feedback->rating = $validatedData['rating'];
            $feedback->save();
        }

        // Retrieve updated ratings
        $ratings = model_feedback::where('doctor_id', $d_id)->pluck('rating')->toArray();

        // Log the retrieved ratings
        Log::info('Retrieved Ratings:', ['ratings' => $ratings]);

        // Calculate the average rating
        $averageRating = 0;
        $numberOfReviews = count($ratings);

        if ($numberOfReviews > 0) {
            $averageRating = array_sum($ratings) / $numberOfReviews;
        }

        // Log the calculated average rating
        Log::info('Calculated Average Rating:', ['averageRating' => $averageRating]);

        // Update the average rating in the database
        $ratingUpdate = model_averagrRating::where('doctor_id', $d_id)->first();

        if ($ratingUpdate) {
            // Update existing entry
            $ratingUpdate->average_rating = $averageRating;
            $ratingUpdate->number_of_reviews = $numberOfReviews;
            $ratingUpdate->save();
        } else {
            // Create new entry
            $rating = new model_averagrRating();
            $rating->doctor_id = $d_id;
            $rating->average_rating = $averageRating;
            $rating->number_of_reviews = $numberOfReviews;
            $rating->save();
        }

        // Redirect back to the doctor profile page with success message
        return redirect()->route('doctor.profile', ['d_id' => $d_id])
            ->with('success', 'Rating submitted successfully');
    } catch (Exception $e) {
        Log::error('Failed to insert or update rating: ' . $e->getMessage());

        return redirect()->back()->with('error', 'Failed to submit rating. Please try again later.');
    }
}



// Import the Appointment model

public function index()
{
    // Assuming you're retrieving appointment records from the Appointment model
    $appointments = model_book::paginate(10); // Paginate the results with 10 records per page

    return view('view_appoinment', compact('appointments'));
}

}
