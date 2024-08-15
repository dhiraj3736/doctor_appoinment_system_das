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
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class book_controller extends Controller
{
    public function run($d_id)
    {
        // Fetch the doctor data
        $doctor = model_doctor::where('d_id', $d_id)->first();
        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor not found');
        }

        // Prepare initial data
        $data = [
            'url' => url('/book/{d_id}'),
            'title' => "Book an Appointment with".$doctor->name,
            'doctor' => $doctor,
        ];

        return view('bookAppoinment', $data);
    }

        public function getAvailableSlots(Request $request)
    {
        $date = $request->query('date');
        $d_id = $request->query('d_id');

        $doctor = model_doctor::where('d_id', $d_id)->first();
        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found'], 404);
        }

        $timeSlots = $this->generateTimeSlots($doctor->fromtime, $doctor->totime);

        $bookedSlots = model_book::where('doctor', $doctor->name)
            ->where('date', $date)
            ->pluck('time')
            ->toArray();

            // dd($bookedSlots);
        return response()->json([
            'timeSlots' => $timeSlots,
            'bookedSlots' => $bookedSlots
        ]);
    }

    private function generateTimeSlots($fromtime, $totime)
    {
        $timeSlots = [];
        $start = new DateTime($fromtime);
        $end = new DateTime($totime);

        while ($start < $end) {
            $timeSlots[] = $start->format('H:i');
            $start->add(new DateInterval('PT30M')); // Add 30 minutes
        }

        return $timeSlots;
    }


    public function insert(Request $request)
    {
        // Validation
        $request->validate([
            'dov' => 'required|date|after_or_equal:today',  // Validating date of visit
            'selected_time' => 'required',  // Validating time in HH:MM format

            'reason' => 'nullable|string|max:255'
        ]);

        $u_id = session('u_id');
        $userInfo = model_signup::where('u_id', $u_id)->first();
        $fullName = $userInfo['fullname'];
        $email = $userInfo['email'];
        $address = $userInfo['address'];
        $number = $userInfo['number'];

        $input = new model_book();
        $input->name = $fullName;
        $input->date = $request->input('dov');
        $input->email = $email;
        $input->address = $address;
        $input->doctor = $request->input('doctorName');
        $input->time = $request->input('selected_time');
        $input->number = $number;
        $input->reason = $request->input('reason');
        $input->u_id = $u_id;

        $input->save();

        // Notify doctors and admins
        $doctors = doctor_v_model::all();
        $admin = model_admin::all();
        $recipients = $doctors->merge($admin);
        Notification::send($recipients, new Booknotification($input->name, $input->doctor));

        return redirect('/upCommingSchedule')->with('message', 'Appointment booked successfully.');
    }



public function select(){
    $select_item = model_book::where('u_id', session('u_id'))
    ->leftJoin('doctor', 'doctor.name', '=', 'book.doctor') // Assuming 'doctor' is the table name
    ->select('doctor.*', 'book.*')
    ->whereRaw("CONCAT(book.date, ' ', book.time) >= ?", [\Carbon\Carbon::now()])
    ->orderBy('b_id', 'desc')
    ->paginate(4);




    return view('upCommingSchedule', compact('select_item'));
}

public function selectCompletedSchedule(){
    $select_item = model_book::where('u_id', session('u_id'))
    ->leftJoin('doctor', 'doctor.name', '=', 'book.doctor') // Assuming 'doctor' is the table name
    ->select('doctor.*', 'book.*')
    ->whereRaw("CONCAT(book.date, ' ', book.time) < ?", [\Carbon\Carbon::now()])
    ->orderBy('b_id', 'desc')
    ->paginate(4);




    return view('completedSchedule', compact('select_item'));
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


public function edit($b_id) {
    // Construct the URL for the form action
    $url = url('/edit') . '/' . $b_id;

    // Retrieve the booking record
    $select_item = model_book::find($b_id);

    // If no booking is found, redirect back with an error
    if (!$select_item) {
        return redirect()->back()->with('error', 'Booking not found');
    }

    // Retrieve the doctor associated with the booking using a more reliable join
    $doctor = model_doctor::where('name', $select_item->doctor)->first();

    // If the doctor is not found, handle it (optional)
    if (!$doctor) {
        return redirect()->back()->with('error', 'Doctor associated with this booking not found');
    }

    // Prepare the title
    $title = "Update Appointment with " . $doctor->name;

    // Pass the necessary data to the view
    $data = compact('doctor', 'select_item', 'url', 'title');

    return view('bookAppoinment')->with($data);
}

public function update(Request $request,$b_id){


    $input=model_book::find($b_id);




    $input->date = $request->input('dov');

    $input->doctor = $request->input('doctorName');
    $input->time = $request->input('selected_time');

    $input->reason=$request->input('reason');


    $input->save();
    return redirect('/upCommingSchedule')->with('message', 'Appointment update successfully.');



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

public function serviceDoctor(Request $request,$s_id){

    $service=model_service::find($s_id);
    $doctors = model_doctor::whereJsonContains('service_id', $s_id)
            ->leftjoin('average_rating','doctor.d_id',"=",'average_rating.doctor_id')
            ->select('doctor.*','average_rating.average_rating')
            ->get();
    $data=compact('service','doctors');
    return view('/serviceDoctor')->with($data);
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
